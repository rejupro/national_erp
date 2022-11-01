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
use App\RawProductSale;
use App\RawProductSaleDet;
use App\Customer;
use DB;
use Auth;

class RawSalesController extends Controller
{
    public function raw_salecreate(){
        $products = Product::latest()->get();
        $customer = Customer::where('status', '1')->get();
        return view('main.admin.rawmaterial.sales.sale_create', compact('customer', 'products'));
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

    // Product by Batch
    public function batch_stock($batch){
        $batch = RawProductStock::where('product_batch', $batch)->first();
        $rest_amount = $batch->total_ready_product - $batch->sell_product;
        $product_price = round( $batch->product_cost / $batch->total_ready_product , 2 );
        return response()->json([
            'rest_amount' => $rest_amount,
            'product_price' => $product_price,
        ]);
    }

    // Product Cart Data Remove
    public function salecartdataremove($id){
        $userid = Auth::user()->id;
        $delete = RawProductCart::where('user_id', $userid)->where('product_id', $id)->delete();
        $cartCount = RawProductCart::where('user_id', $userid)->get()->count();
        if($delete){
            return response()->json([
                'message' => 'Cart Removed Successfully',
                'count' => $cartCount
            ]);
        }
    }

    // Sales Store
    public function rawproduct_salestore(Request $request){
        $validated = $request->validate([
            'supplier' => 'required',
            'product_batch.*' => 'required',
            'price.*' => 'required|numeric|gt:0',
            'quantity.*' => 'required|numeric|gt:0',
            'product_price.*' => 'required|numeric|gt:0',
        ]);

        $ldate = date('d-m-Y');
        $count = RawProductSale::get()->count();
        if($count > 0){
            $increase  = $count + 1;
            $invoice = 'pro-invoice-' . $increase;
        }else{
            $invoice = 'pro-invoice-1';
        }
        $insertSale = RawProductSale::insert([
            'invoice_no' => $invoice,
            'supplier_id' => $request->supplier,
            'total_price' => $request->total_price,
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
        $cartCount = RawProductCart::where('user_id', $userid)->get()->count();
        $i = 0;

        for ($i; $i < $cartCount; $i++):
            $array[] = [
                'invoice_no' => $invoice,
                'product_id' => $request->product_id[$i],
                'product_batch' => $request->product_batch[$i],
                'price' => $request->price[$i],
                'quantity' => $request->quantity[$i],
                'product_price' => $request->product_price[$i],
            ];

            $RawProductStock = RawProductStock::where('product_batch', $request->product_batch[$i])->whereNotIn('stock_status', [1,5])->first();
            $update_quantity = RawProductStock::where('product_batch', $request->product_batch[$i])->whereNotIn('stock_status', [1,5])->first()->sell_product + $request->quantity[$i];
            DB::table('raw_product_stocks')->where('product_batch', $request->product_batch[$i])->whereNotIn('stock_status', [1,5])->update([
                'sell_product' => $update_quantity
            ]);
            if($RawProductStock->total_ready_product == $RawProductStock->sell_product + $request->quantity[$i] || $RawProductStock->total_ready_product < $RawProductStock->sell_product + $request->quantity[$i]){
                DB::table('raw_product_stocks')->where('product_batch', $request->product_batch[$i])->whereNotIn('stock_status', [1,5])->update([
                    'stock_status' => 1
                ]);
            }
        endfor;

        $stockdet = RawProductSaleDet::insert($array);
        if($stockdet){
            $delete = RawProductCart::where('user_id', $userid)->delete();
        }

        if($insertSale && $stockdet){
            return response()->json([
                'message' => 'Sale Added Successfully',
            ]);
        }
        
    }

    // All Sales
    public function raw_allsale(){
        $sales = DB::table('raw_product_sales')
        ->leftjoin('customers', 'raw_product_sales.supplier_id', '=', 'customers.id')
        ->select('raw_product_sales.*', 'customers.name as supplier_name')
        ->orderBy('id', 'DESC')
        ->get();
        return view('main.admin.rawmaterial.sales.all_sale', compact('sales'));
    }
    // Sale Single
    public function raw_salesingle($id){
        $list = RawProductSale::orderBy('id', 'DESC')->get();
        $resultId = $id;
        $results = RawProductSale::where('id', $id)->first();
        $invoice = RawProductSale::where('id', $id)->first()->invoice_no;
        $data = DB::table('raw_product_sale_dets')
        ->leftjoin('products', 'raw_product_sale_dets.product_id', '=', 'products.id')
        ->select('raw_product_sale_dets.*', 'products.name as product_name')
        ->where('invoice_no', $invoice)
        ->get();
        return view('main.admin.rawmaterial.sales.sale_view', compact('list', 'resultId', 'results', 'data'));
    }



}
