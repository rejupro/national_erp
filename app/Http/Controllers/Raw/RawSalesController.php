<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Rawmaterial;
use App\RawmaterialStock;
use App\RawmaterialStockDetail;
use App\RawProductStock;
use App\RawProductStockMaterial;
use App\RawProductStockExpense;
use App\Supplier;
use App\RawProductCart;
use DB;
use Auth;

class RawSalesController extends Controller
{
    public function raw_salecreate(){
        $products = Product::latest()->get();
        $supplier = Supplier::where('status', '1')->get();
        return view('main.admin.rawmaterial.sales.sale_create', compact('supplier', 'products'));
    }
    // Material Add to Cart
    public function producttocart($id){
        $userid = Auth::user()->id;
        $stockCheck = RawProductStock::where('product_id', $id)->whereNotIn('stock_status', [1,5])->get()->count();
        $dataExist = RawProductCart::where('user_id', $userid)->where('product_id', $id)->get()->count();
        if($stockCheck > 0){
            if($dataExist > 0){
                return response()->json([
                    'message_error' => 'This Product Already In Cart',
                ]);
            }else{
                $insert = RawProductCart::insert([
                    'user_id' => $userid,
                    'product_id' => $id,
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
        }else{
            return response()->json([
                    'message_error' => 'This Product Not in Stock',
                ]);
        }
        
    }
    // Matrial Show Cart
    public function salecartdata(){
        $userid = Auth::user()->id;
        $carts = DB::table('raw_product_carts')
        ->leftjoin('products', 'raw_product_carts.product_id', '=', 'products.id')
        ->where('raw_product_carts.user_id', '=', $userid)
        ->select('raw_product_carts.*', 'products.name as product_name')
        ->get();

        $datas = [];

        foreach($carts as $values){
            $batch = RawProductStock::where('product_id', $values->product_id)->get();
            $item = [
                'product_id' => $values->product_id,
                'product_name' => $values->product_name,
                'batch' => $batch
            ];
            array_push($datas, $item);
        }





        $count = $carts->count();

        return response()->json([
            'data'  => $datas,
            'count' => $count
        ]);
    }
    // Material Cart Data Remove
    public function salecartdataremove($id){
        $userid = Auth::user()->id;
        $delete = RawProductCart::where('user_id', $userid)->where('product_id', $id)->delete();
        if($delete){
            return response()->json([
                'message' => 'Cart Removed Successfully',
            ]);
        }
    }
}
