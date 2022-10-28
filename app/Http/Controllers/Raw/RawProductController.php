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
        $material_price = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->price;
        $stock_invoice = RawmaterialStockDetail::where('material_id', $id)->whereNotIn('finished', [1,5])->first()->stock_invoice;
        $checkstock = RawmaterialStockDetail::where('material_id', $id)->where('finished', '0')->get()->count();
        if($checkstock > 0){
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
            'give_type' => 'required',
            'total_readyproduct' => 'required',
            'maked.*' => 'required',
            'expense_total.*' => 'required'
        ]);
        $user_id = Auth::user()->id;
        $count = RawStockCart::where('user_id', $user_id)->get()->count();
        $i = 0;
        for ($i; $i < $count; $i++):
            $array[] = [
                'product_id' => $request->product_id[$i],
                'maked' => $request->maked[$i],
            ];
            $RawmaterialStockDetail = RawmaterialStockDetail::where('material_id', $request->product_id[$i])->whereNotIn('finished', [1,5])->first();
            $update_quantity = RawmaterialStockDetail::where('material_id', $request->product_id[$i])->whereNotIn('finished', [1,5])->first()->maked_quantity + 1;
            DB::table('rawmaterial_stock_details')->where('material_id', $request->product_id[$i])->where('stock_invoice', $request->stock_invoice[$i])->whereNotIn('finished', [1,5])->update([
                'maked_quantity' => $update_quantity
            ]);

        endfor;
        
        return response()->json([
            'message' => 'Thanks you',
            'data' => $array,
            'count' => $count,

        ]);
        
    }
}
