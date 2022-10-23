<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rawmaterial;
use App\Rawmaterialcart;
use App\RawmaterialStock;
use App\RawmaterialStockDetail;
use App\Supplier;
use Auth;
use DB;

class MaterialPurchaseController extends Controller
{
    // Purchase Page Show
    public function purchase(){
        $products = Rawmaterial::latest()->get();
        $supplier = Supplier::where('status', '1')->get();
        return view('main.admin.rawmaterial.purchase.raw_purchase', compact('products', 'supplier'));
    }
    // Material Add to Cart
    public function rawtocart($id){

        $userid = Auth::user()->id;
        $dataExist = Rawmaterialcart::where('user_id', $userid)->get()->count();
        if($dataExist > 0){
            return response()->json([
                'message_error' => 'Please checkout this first',
            ]);
        }else{
            $insert = Rawmaterialcart::insert([
                'user_id' => $userid,
                'material_id' => $id,
            ]);
    
            if($insert){
                return response()->json([
                    'message' => 'Cart Added Successfully',
                ]);
            }else{
                return response()->json([
                    'message' => 'Not Added',
                ]);
            }
        }

    }
    // Matrial Show Cart
    public function rawcartdata(){
        $userid = Auth::user()->id;
        $datas = DB::table('raw_materialcarts')
        ->leftjoin('rawmaterials', 'raw_materialcarts.material_id', '=', 'rawmaterials.id')
        ->where('raw_materialcarts.user_id', '=', $userid)
        ->select('raw_materialcarts.*', 'rawmaterials.name as material_name')
        ->get();

        $count = $datas->count();

        return response()->json([
            'data'  => $datas,
            'count' => $count
        ]);
    }
    // Material Cart Data Remove
    public function rawcartremove($id){
        $delete = Rawmaterialcart::where('id', $id)->delete();
        if($delete){
            return response()->json([
                'message' => 'Cart Removed Successfully',
            ]);
        }
    }


    // Purchase Store
    public function rawmaterial_purchasestore(Request $request){
        $validated = $request->validate([
            'material_id' => 'required',
            'qty_type' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'supplier' => 'required'
        ]);

        
        $ldate = date('d-m-Y');
        $count = RawmaterialStock::where('material_id', $request->material_id)->count();
        if($count > 0){
            $qty_type = RawmaterialStock::where('material_id', $request->material_id)->first()->qty_type;
            if($qty_type === $request->qty_type){
                $updatestock = RawmaterialStock::where('material_id', $request->material_id)->first()->total_stock + $request->quantity;
                $updateprice = RawmaterialStock::where('material_id', $request->material_id)->first()->grand_total + $request->grand_total;
                $insertstock = RawmaterialStock::where('material_id', $request->material_id)->update([
                    'total_stock' => $updatestock,
                    'grand_total' => $updateprice,
                ]);

                $count_invoice = RawmaterialStockDetail::where('material_id', $request->material_id)->get()->count() + 1;
                $stock_invoice = "invoice-" . $request->material_id . "-" . $count_invoice;
                $insertstockdetails = RawmaterialStockDetail::insert([
                    'material_id' => $request->material_id,
                    'stock_invoice' => $stock_invoice,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'supplier' => $request->supplier,
                    'dis_percen' => $request->dis_percen,
                    'dis_percen_amount' => $request->dis_percen_amount,
                    'direct_dis' => $request->direct_dis,
                    'vat_percen' => $request->vat_percen,
                    'vat_percen_amount' => $request->vat_percen_amount,
                    'tax_percen' => $request->tax_percen,
                    'tax_percen_amount' => $request->tax_percen_amount,
                    'others' => $request->others,
                    'frac_dis' => $request->frac_dis,
                    'grand_total' => $request->grand_total,
                    'date' => $ldate
                ]);

                $userid = Auth::user()->id;
                $deletecart = Rawmaterialcart::where('user_id', $userid)->delete();

                if($insertstock && $insertstockdetails && $deletecart){
                    return response()->json([
                        'message' => 'Materials Added In Stock Successfully',
                    ]);
                }
            }else{
                return response()->json([
                    'qty_error' => "Error In Quantity Type, before was (". $qty_type . ")",
                ]);
            }
            
        }else{
            $insertstock = RawmaterialStock::insert([
                'material_id' => $request->material_id,
                'qty_type' => $request->qty_type,
                'total_stock' => $request->quantity,
                'grand_total' => $request->grand_total
            ]);
            $count = RawmaterialStockDetail::where('material_id', $request->material_id)->get()->count();
            if($count > 0 ){
                $increase = $count + 1;
                $stock_invoice = "invoice-" . $request->material_id . "-" . $increase;
            }else{
                $stock_invoice = "invoice-" . $request->material_id . "-1";
            }
            
            $insertstockdetails = RawmaterialStockDetail::insert([
                'material_id' => $request->material_id,
                'stock_invoice' => $stock_invoice,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'supplier' => $request->supplier,
                'dis_percen' => $request->dis_percen,
                'dis_percen_amount' => $request->dis_percen_amount,
                'direct_dis' => $request->direct_dis,
                'vat_percen' => $request->vat_percen,
                'vat_percen_amount' => $request->vat_percen_amount,
                'tax_percen' => $request->tax_percen,
                'tax_percen_amount' => $request->tax_percen_amount,
                'others' => $request->others,
                'frac_dis' => $request->frac_dis,
                'grand_total' => $request->grand_total,
                'date' => $ldate
            ]);

            $userid = Auth::user()->id;
            $deletecart = Rawmaterialcart::where('user_id', $userid)->delete();

            if($insertstock && $insertstockdetails && $deletecart){
                return response()->json([
                    'message' => 'Materials Added In Stock Successfully',
                ]);
            }
        }
       
    }

    // Raw Material Stock Management
    public function material_stock(){
        $datas = DB::table('rawmaterial_stocks')
        ->leftjoin('rawmaterials', 'rawmaterial_stocks.material_id', '=', 'rawmaterials.id')
        ->select('rawmaterial_stocks.*', 'rawmaterials.name as material_name', 'rawmaterials.code', 'rawmaterials.image')
        ->orderBy('id', 'DESC')
        ->get();


        return view('main.admin.rawmaterial.stock.stock_main', compact('datas'));
    }

    public function material_stocksingle($id){
        $datas = DB::table('rawmaterial_stock_details')
        ->where('material_id', $id)
        ->leftjoin('rawmaterials', 'rawmaterial_stock_details.material_id', '=', 'rawmaterials.id')
        ->leftjoin('suppliers', 'rawmaterial_stock_details.supplier', '=', 'suppliers.id')
        ->select('rawmaterial_stock_details.*',  'rawmaterials.code', 'suppliers.name as supplier_name')
        ->orderBy('id', 'DESC')
        ->get();
        $material_name = Rawmaterial::where('id', $id)->first()->name;
        $total = DB::table('rawmaterial_stock_details')->where('material_id',$id)->sum('quantity');
        $qty_type = RawmaterialStock::where('material_id', $id)->first()->qty_type;
        $total_price = DB::table('rawmaterial_stock_details')->where('material_id',$id)->sum('price');
        $grand_total = DB::table('rawmaterial_stock_details')->where('material_id',$id)->sum('grand_total');
        return view('main.admin.rawmaterial.stock.stock_single', compact('datas', 'material_name', 'total', 'qty_type', 'total_price', 'grand_total') );
    }









}
