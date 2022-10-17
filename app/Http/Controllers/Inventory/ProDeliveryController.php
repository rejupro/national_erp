<?php

namespace App\Http\Controllers\Inventory;
use App\Product_delivery;
use App\Sale;
use App\Sales_detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\Cart;
use App\Purchase_detail;
use App\Bank;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Purchase;
use App\Payment;
use App\Product_receipt;
use App\BranchStock;
use App\WarehouseStock;
use Redirect;
use Auth;
use DB;

class ProDeliveryController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){ 
            $delivery = Product_delivery::orderBy('created_at','desc')->get();
          }else{
            $delivery = Product_delivery::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
      
        return view('main.admin.inventory.delivery_list',compact('delivery'));
    }
    public function create()
    {
        $brid=Auth::User()->brand_id;
        //$sale = Sale::where('branch_id',$brid)->orderBy('created_at','desc')->get();
        $sale=DB::table('sales')
        ->join('sales_details','sales_details.sale_track','=','sales.sales_invoice')
        ->select('sales.sales_invoice','sales_details.quantity','sales_details.dqty')
        ->where('sales.branch_id',$brid)
        ->orderBy('sales.created_at','desc')
        ->get();
        // foreach($sal as $kk):
        //     if($kk->quantity > $kk->dqty){
        //         $sale[] = $kk;
        //     }else{
        //         $sale=0; 
        //     }
        // endforeach;
        // if($sale>0){
            $challan_no = 'DLI'.date('Y'). Product_delivery::get()->max('id');
            $delivery = NULL;
            return view('main.admin.inventory.delivery_create',compact('sale','delivery','challan_no'));
    //     }else{
    //         return Redirect::route('prodelivery-list')->withErrors(['No Sales to Delivery...!!!']);
    //   }
           
    }

    public function delivery_store(Request $request)
    {
        $order = Sale::where('sales_invoice',$request->sales_invoice)->first();
        $sales_invoice = $request->sales_invoice;
        $order_no = $order->id;
        $challan_no = $request->challan_no;
        $deli_date = $request->deli_date;
        $note = $request->note;
        $created_by = Auth::User()->name;
        $product = Sales_detail::where('sale_track',$request->sales_invoice)->get();
        $delivery = 1;
        return view('main.admin.inventory.delivery_create',compact('product','delivery','sales_invoice','order_no','challan_no','note','deli_date','sales_invoice'));
    }

    public function stock_store(Request $request)
    {
        $array = [];
        foreach($request->sales_invoice as $i => $invoice):
                $products = Product::where('id', $request->item_id[$i])->first();
                $stock = $products->min_stock;
                $min_stock = $stock - $request->deli_qty[$i];
            $array[] = [
                'sales_invoice' => $invoice,
                'order_no' => $request->order_no,
                'challan_no' => $request->challan_no,
                'deli_date' => $request->deli_date,
                'note' => $request->note,
                'item_id' => $request->item_id[$i],
                'item_name' => $request->item_name[$i],
                'sales_qty' => $request->sales_qty[$i],
                'deli_qty' => $request->deli_qty[$i],
                'rest_qty' => $request->rest_qty[$i],
                'created_by' => Auth::User()->name,
                'uid' => Auth::User()->id,
                'brid' => Auth::User()->brand_id,
                'now_qty' => $min_stock,
            ]; 
                $stock = Sale::where('sales_invoice',$request->sales_invoice)->first();
                $first = filter_var($stock->product_store, FILTER_SANITIZE_NUMBER_INT);
                $storestock = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                $second=filter_var($stock->product_store, FILTER_SANITIZE_STRING);
                $type= preg_replace("/[^A-Za-z\-]/",'', $second);

                // $dqty_stock = Sales_detail::where('sale_track',$request->sales_invoice)->first();
               
                // $sale_dqty_update = Sales_detail::where('sale_track',$request->sales_invoice)->update([
                //     'dqty' => $dqty,
                // ]);

                $dqty_stock = Sales_detail::where('sale_track',$request->sales_invoice[$i])->where('item_id',$request->item_id[$i])->get();
                foreach($dqty_stock as $dqty_stocks){
                    $dqty = $dqty_stocks->dqty + $request->deli_qty[$i];
                }
                

                $sale_dqty_update = Sales_detail::where('sale_track',$request->sales_invoice[$i])->where('item_id',$request->item_id[$i])->update([
                    'dqty' => $dqty,
                ]);
                if($type == 'BR-')
                {
                    $branch_stock = BranchStock::where('product_id',$request->item_id[$i])->first();
                    if($branch_stock){
                        $branch_min_stock = $branch_stock->quantity - $request->deli_qty[$i];
                        $branch_stock = BranchStock::where('product_id',$request->item_id[$i])->update([
                            'quantity' => $branch_min_stock ,
                            'sold_qty' => $request->sales_qty[$i],
                            'deli_qty' => $request->deli_qty[$i],
                            'return_qty' => $request->sales_qty[$i] - $request->deli_qty[$i],
                        ]);

                    }else{
                        $branch_stock = BranchStock::insert([
                            'branch_id' => $storestock ,
                            'product_id' => $request->item_id[$i] ,
                            'invoice' => $invoice ,
                            'quantity' => $request->deli_qty[$i] ,
                            'sold_qty' => $request->sales_qty[$i] ,
                            'deli_qty' => $request->deli_qty[$i] ,
                            'rest_qty' => $request->rest_qty[$i] ,
                            'created_by' => Auth::User()->name,
                            'uid' => Auth::User()->id,
                            'brid' => Auth::User()->brand_id,
                        ]);

                    }
                   
                }
                else{
                    $warehouse_stock = WarehouseStock::where('product_id',$request->item_id[$i])->first();
                    $warehouse_min_stock = $warehouse_stock->quantity - $request->rcv_qty[$i];
                    $warehouse_stock_update = WarehouseStock::where('product_id',$request->item_id[$i])
                    ->update([
                        'quantity' => $warehouse_min_stock ,
                        'sold_qty' => $request->sales_qty[$i],
                        'deli_qty' => $request->deli_qty[$i],
                        'return_qty' => $request->sales_qty[$i] - $request->deli_qty[$i],
                    ]);
                }
                $product = Product::where('id',$request->item_id)->update(['min_stock' => $min_stock]);
        endforeach;
        Product_delivery::insert($array);
        return Redirect::route('prodelivery-list')->with('success', 'Delivery Added Successfully...!!!');

    }

    public function show($id)
    {
        $data = Product_delivery::findOrFail($id);
        // $delivery=Sales_detail::get();
        // dd($delivery->toArray());
        return view('main.admin.inventory.delivery_view',compact('data'));
    }

    public function destroy($id)
    {
        $delivery = Product_delivery::findOrfail($id);
        $delivery->delete();
        return redirect(route('prodelivery-list'))->with('success', 'Delivery Delete Successfully...!!!');
    }
}
