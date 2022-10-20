<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rawmaterial;
use App\Rawmaterialcart;
use App\RawmaterialStock;
use App\RawmaterialStockDetail;
use Auth;
use DB;

class MaterialPurchaseController extends Controller
{
    // Purchase Page Show
    public function purchase(){
        $products = Rawmaterial::latest()->get();
        return view('main.admin.rawmaterial.purchase.raw_purchase', compact('products'));
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
        ]);

        
        $ldate = date('d-m-Y');
        $count = RawmaterialStock::where('material_id', $request->material_id)->count();
        if($count > 0){
            $qty_type = RawmaterialStock::where('material_id', $request->material_id)->first()->qty_type;
            if($qty_type === $request->qty_type){
                $updatestock = RawmaterialStock::where('material_id', $request->material_id)->first()->total_stock + $request->quantity;
                $insertstock = RawmaterialStock::where('material_id', $request->material_id)->update([
                    'total_stock' => $updatestock,
                ]);

                $count_invoice = RawmaterialStockDetail::latest()->count() + 1;
                $stock_invoice = "invoice-code-". $count_invoice;
                $insertstockdetails = RawmaterialStockDetail::insert([
                    'material_id' => $request->material_id,
                    'stock_invoice' => $stock_invoice,
                    'quantity' => $request->quantity,
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
            ]);
            $count = RawmaterialStockDetail::get()->count();
            if($count > 0 ){
                $increase = $count + 1;
                $stock_invoice = "invoice-code-" . $increase;
            }else{
                $stock_invoice = "invoice-code-1";
            }
            
            $insertstockdetails = RawmaterialStockDetail::insert([
                'material_id' => $request->material_id,
                'stock_invoice' => $stock_invoice,
                'quantity' => $request->quantity,
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
        ->select('rawmaterial_stock_details.*',  'rawmaterials.code')
        ->orderBy('id', 'DESC')
        ->get();
        $material_name = Rawmaterial::where('id', $id)->first()->name;
        $total = DB::table('rawmaterial_stock_details')->where('material_id',$id)->sum('quantity');
        $qty_type = RawmaterialStock::where('material_id', $id)->first()->qty_type;

        return view('main.admin.rawmaterial.stock.stock_single', compact('datas', 'material_name', 'total', 'qty_type') );
    }









}
