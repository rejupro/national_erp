<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Rawmaterial;
use App\RawmaterialStock;
use App\RawmaterialStockDetail;
use App\RawStockCart;
use App\RawOthermaterial;
use App\RawOthermatCart;
use App\RawProductStock;
use App\RawProductStockMaterial;
use App\RawProductStockExpense;
use DB;
use Auth;

class RawProductController extends Controller
{
    public function rawproduct_create(){
        $products = Product::latest()->get();
        $rawmaterial = DB::table('rawmaterial_stocks')
        ->leftjoin('rawmaterials', 'rawmaterial_stocks.material_id', '=', 'rawmaterials.id')
        ->select('rawmaterial_stocks.*', 'rawmaterials.name', 'rawmaterials.code')
        ->orderBy('id', 'DESC')
        ->get();
        $expense = RawOthermaterial::latest()->get();
        return view('main.admin.rawmaterial.rawproduct.rawproduct_create', compact('products', 'rawmaterial', 'expense'));
    }

    // Raw Product Cart
    public function rawproduct_cart($id){
        $material_id = Rawmaterial::where('id', $id)->first()->id;
        $material_name = Rawmaterial::where('id', $id)->first()->name;
        $qty_type = RawmaterialStock::where('material_id', $id)->first()->qty_type;
        
        $checkstock = RawmaterialStockDetail::where('material_id', $id)->where('finished', '0')->get()->count();
        if($checkstock > 0){
            $material_price = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->price;
            $stock_invoice = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->stock_invoice;
            if($qty_type === 'ton'){
                $qty_type = 'kg';
                $stock_qty = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->quantity;
                $in_cart = 1000*$stock_qty;
                $maked_qty = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->maked_quantity;
                $rest_amount = 1000 * ($stock_qty - $maked_qty);
            }else{
                $stock_qty = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->quantity;
                $in_cart = $stock_qty;
                $maked_qty = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->maked_quantity;
                $rest_amount = $stock_qty - $maked_qty;
            }
            $user_id = Auth::user()->id;
            $dataExist = RawStockCart::where('user_id', $user_id)->where('material_id', $id)->get()->count();
            if($dataExist > 0){
                return response()->json([
                    'dataExist' => 'This Material Already in List',
                ]);
            }else{
                $insert = RawStockCart::insert([
                    'user_id' => $user_id,
                    'material_id' => $material_id,
                    'material_name' => $material_name,
                    'qty_type' => $qty_type,
                    'rest_amount' => $rest_amount,
                    'material_price' => $material_price,
                    'stock_qty' => $in_cart,
                    'stock_invoice' => $stock_invoice,
                ]);
                if($insert){
                    return response()->json([
                        'message' => 'Matterial Added In List Successfully',
                    ]);
                }
            }
        }else{
            return response()->json([
                'stock_error' => 'Material Stock Finished',
            ]);
        }
        
    }
    // Raw Product Cart List
    public function rawproduct_cartlist(){
        $user_id = Auth::user()->id;
        $data = RawStockCart::where('user_id', $user_id)->get();
        $cartcount = $data->count();
        return response()->json([
            'cartcount' => $cartcount,
            'data' => $data,
        ]);
    }

    // Raw Product Remove from list
    public function rawproduct_cartremove($id){
        $user_id = Auth::user()->id;
        $delete = RawStockCart::where('material_id', $id)->where('user_id', $user_id)->delete();
        if($delete){
            return response()->json([
                'message' => 'Cart Removed Successfully',
            ]);
        }
    }

    // Expense Cart Add
    public function expense_cartadd($id){
        $user_id = Auth::user()->id;
        $othermaterial_name = RawOthermaterial::where('id', $id)->first()->name;
        $price = RawOthermaterial::where('id', $id)->first()->price;
        $dataExist = RawOthermatCart::where('user_id', $user_id)->where('othermaterial_id', $id)->get()->count();
        if($dataExist > 0){
            return response()->json([
                'dataExist' => 'This Expense Already in List',
            ]);
        }else{
            
            $insert = RawOthermatCart::insert([
                'user_id' => $user_id,
                'othermaterial_id' => $id,
                'othermaterial_name' => $othermaterial_name,
                'price' => $price,
            ]);
            if($insert){
                return response()->json([
                'message' => 'Expense Added Successfully',
            ]);
            }
        }
    }

    // Expense Cart List
    public function expense_cartlist(){
        $user_id = Auth::user()->id;
        $data = RawOthermatCart::where('user_id', $user_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }
    // expense remove
    public function expense_cartremove($id){
        $user_id = Auth::user()->id;
        $delete = RawOthermatCart::where('othermaterial_id', $id)->where('user_id', $user_id)->delete();
        if($delete){
            return response()->json([
                'message' => 'Expense Removed Successfully',
            ]);
        }
    }

    // Raw Product Store
    public function rawproduct_store(Request $request){
        $validated = $request->validate([
            'product_batch' => 'required|unique:raw_product_stocks',
            'product' => 'required',

            'give_type' => 'required',
            'total_readyproduct' => 'required',
            'maked.*' => 'required|min:1',
            'expense_qty.*' => 'required|min:1',
            'expense_total.*' => 'required',
        ]);
        // Insert In Stock
        $stockinsert = RawProductStock::insert([
            'product_batch' => $request->product_batch,
            'product_id' => $request->product,
            'product_cost' => $request->totalHisab, //all cost with expenses
            'packate_expense' => $request->total, //just packate price
            'well_product' => $request->well_product, 
            'other_expense' => $request->other_expense, 
            'deduction_expense' => $request->deduction_expense, 
            'wasted_product' => $request->wasted_product, 
            'extra_product' => $request->extra_product, 
            'total_ready_product' => $request->total_readyproduct, 
        ]);



        // Insert In Stock Material
        $user_id = Auth::user()->id;
        $count = RawStockCart::where('user_id', $user_id)->get()->count();
        $i = 0;
        for ($i; $i < $count; $i++):
            $array[] = [
                'product_batch' => $request->product_batch,
                'material_id' => $request->product_id[$i],
                'give_type' => $request->give_type[$i],
                'given_amount' => $request->given_amount[$i],
                'packate_type' => $request->packate_type[$i],
                'packate_weight' => $request->packate_weight[$i],
                'product_cost' => $request->product_cost[$i],
                'maked' => $request->maked[$i],
                'packate_type' => $request->give_type[$i],
            ];
            
            if($request->give_type[$i] == 'kg'){
                $given_amount = round($request->given_amount[$i] / 1000, 2);
            }else{
                $given_amount = $request->given_amount[$i];
            }

            $RawmaterialStockDetail = RawmaterialStockDetail::where('material_id', $request->product_id[$i])->whereNotIn('finished', [1,5])->first();
            $update_quantity = RawmaterialStockDetail::where('material_id', $request->product_id[$i])->whereNotIn('finished', [1,5])->first()->maked_quantity + $given_amount;
            DB::table('rawmaterial_stock_details')->where('material_id', $request->product_id[$i])->where('stock_invoice', $request->stock_invoice[$i])->whereNotIn('finished', [1,5])->update([
                'maked_quantity' => $update_quantity
            ]);
            if($RawmaterialStockDetail->quantity == $RawmaterialStockDetail->maked_quantity + $given_amount || $RawmaterialStockDetail->quantity < $RawmaterialStockDetail->maked_quantity + $given_amount){
                DB::table('rawmaterial_stock_details')->where('material_id', $request->product_id[$i])->where('stock_invoice', $request->stock_invoice[$i])->whereNotIn('finished', [1,5])->update([
                'finished' => 1,
                ]);
            }
        endfor;
        $stockmaterial = RawProductStockMaterial::insert($array);
        if($stockmaterial){
            $deletecart1 = RawStockCart::where('user_id', $user_id)->delete();
        }

        // Insert In Stock Expense
        $expensecount = RawOthermatCart::where('user_id', $user_id)->get()->count();
        $e = 0;
        for ($e; $e < $expensecount; $e++):
            $expensearray[] = [
                'product_batch' => $request->product_batch,
                'expense_id' => $request->expense_id[$e],
                'expense_price' => $request->expense_price[$e],
                'expense_quantity' => $request->expense_qty[$e],
                'expense_total' => $request->expense_total[$e],
            ];
        endfor;
        $stockexpense = RawProductStockExpense::insert($expensearray);
        if($stockexpense){
            $deletecart = RawOthermatCart::where('user_id', $user_id)->delete();
        }
        
        if($stockmaterial){
            return response()->json([
                'message' => 'Thanks you',
                'data' => $array,

            ]);
        }else{
            return response()->json([
                'message' => 'error man',

            ]);
        }
    }

    // Raw Product Stock
    public function rawproduct_stock(){
        $stock = DB::table('raw_product_stocks')
        ->leftjoin('products', 'raw_product_stocks.product_id', '=', 'products.id')
        ->select('raw_product_stocks.*', 'products.name')
        ->orderBy('id', 'DESC')
        ->get();
        return view('main.admin.rawmaterial.rawproduct.rawproduct_stock', compact('stock'));
    }
    // Raw Product Single
    public function rawproduct_stockbatch($batch){
        $rawmaterial = DB::table('raw_product_stock_materials')
        ->leftjoin('rawmaterials', 'raw_product_stock_materials.material_id', '=', 'rawmaterials.id')
        ->where('product_batch', $batch)
        ->select('raw_product_stock_materials.*', 'rawmaterials.name')
        ->orderBy('id', 'DESC')
        ->get();
        $expense = DB::table('raw_product_stock_expenses')
        ->leftjoin('raw_othermaterials', 'raw_product_stock_expenses.expense_id', '=', 'raw_othermaterials.id')
        ->where('product_batch', $batch)
        ->select('raw_product_stock_expenses.*', 'raw_othermaterials.name')
        ->orderBy('id', 'DESC')
        ->get();
        return view('main.admin.rawmaterial.rawproduct.rawproduct_stockbatch', compact('rawmaterial', 'expense', 'batch'));
    }


}
