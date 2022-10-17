<?php

namespace App\Http\Controllers\Inventory;

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

class ProReceiveController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){ 
            $receipt = Product_receipt::orderBy('created_at','desc')->get();
          }else{
            $receipt = Product_receipt::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get(); 
          }
       
        return view('main.admin.inventory.receive_list',compact('receipt'));
    }
    public function create()
    {
        $brid=Auth::User()->brand_id;
        //$purchase = Purchase::where('branch_id',$brid)->orderBy('created_at','desc')->get();
        $purcha=DB::table('purchase_details')
        ->join('purchases','purchases.pur_invoice','=','purchase_details.purchase_track')
        ->where('purchases.branch_id',Auth::User()->brand_id)
        ->select('purchase_details.purchase_track','purchase_details.quantity','purchase_details.rqty')
        ->orderBy('purchase_details.created_at','desc')
        ->get();
        //dd($purcha);
        // foreach($purcha as $kk):
        //     if($kk->quantity > $kk->rqty){
        //         $purchase[] = $kk;
        //     }else{
        //         $purchase=0;
        //     }
        // endforeach;
        // if($purchase > 0){
            $challan_no = 'REV'.date('Y'). Product_receipt::get()->max('id');
            $receipt = NULL;
            return view('main.admin.inventory.receive_create',compact('purcha','receipt','challan_no'));
            
        // }else{
        //     return Redirect::route('proreceive-list')->withErrors(['No Purchase to Received...!!!']);
        // }
    }

    public function receipt_store(Request $request)
    {
        $order = Purchase::where('pur_invoice',$request->pur_invoice)->first();
        $pur_invoice = $request->pur_invoice;
        $order_no = $order->id;
        $challan_no = $request->challan_no;
        $rcv_date = $request->rcv_date;
        $note = $request->note;
        $created_by = Auth::User()->name;
        $product = Purchase_detail::where('purchase_track',$request->pur_invoice)->get();
        $receipt = 1;
        return view('main.admin.inventory.receive_create',compact('product','receipt','pur_invoice','order_no','challan_no','note','rcv_date','pur_invoice'));
    }

    public function stock_store(Request $request)
    {
        $array = [];
        foreach($request->pur_invoice as $i => $invoice):
                $products = Product::where('id', $request->item_id[$i])->first();
                $stock = $products->min_stock;
                $min_stock = $stock + $request->rcv_qty[$i];
            $array[] = [
                'pur_invoice' => $invoice,
                'order_no' => $request->order_no,
                'challan_no' => $request->challan_no,
                'rcv_date' => $request->rcv_date,
                'note' => $request->note,
                'item_id' => $request->item_id[$i],
                'item_name' => $request->item_name[$i],
                'purchase_qty' => $request->purchase_qty[$i],
                'rcv_qty' => $request->rcv_qty[$i],
                'rest_qty' => $request->rest_qty[$i],
                'created_by' => Auth::User()->name,
                'uid' => Auth::User()->id,
                'brid' => Auth::User()->brand_id,
                'now_qty' => $min_stock,
            ];
                $stock = Purchase::where('pur_invoice',$request->pur_invoice)->first();
                $first = filter_var($stock->product_store, FILTER_SANITIZE_NUMBER_INT);
                $storestock = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                $second=filter_var($stock->product_store, FILTER_SANITIZE_STRING);
                $type= preg_replace("/[^A-Za-z\-]/",'', $second);

                $rqty_stock = Purchase_detail::where('purchase_track',$request->pur_invoice[$i])->where('item_id',$request->item_id[$i])->get();
                foreach($rqty_stock as $rqty_stocks){
                    $rqty = $rqty_stocks->rqty + $request->rcv_qty[$i];
                }
               
                $purchase_rqty_update = Purchase_detail::where('purchase_track',$request->pur_invoice[$i])->where('item_id',$request->item_id[$i])->update([
                    'rqty' => $rqty,
                ]);

                if($type == 'BR-')
                {
                    $branch_stock = BranchStock::where('product_id',$request->item_id[$i])->first();
                    if($branch_stock)
                    {
                        $branch_min_stock = $branch_stock->quantity + $request->rcv_qty[$i];
                        $branch_stock_update = BranchStock::where('product_id',$request->item_id[$i])->update([
                            'quantity' => $branch_min_stock ,
                            'purchase_qty' => $request->purchase_qty[$i] + $branch_stock->purchase_qty ,
                            'recv_qty' => $request->rcv_qty[$i] + $branch_stock->recv_qty,
                            'rest_qty' => $request->rest_qty[$i] + $branch_stock->rest_qty,
                        ]);
                    }
                    else{
                        $branch_stock = BranchStock::insert([
                            'branch_id' => $storestock ,
                            'product_id' => $request->item_id[$i] ,
                            'invoice' => $invoice ,
                            'quantity' => $request->rcv_qty[$i] ,
                            'purchase_qty' => $request->purchase_qty[$i] ,
                            'recv_qty' => $request->rcv_qty[$i] ,
                            'rest_qty' => $request->rest_qty[$i] ,
                            'created_by' => Auth::User()->name,
                            'uid' => Auth::User()->id,
                            'brid' => Auth::User()->brand_id,
                        ]);
                    }
                }
                if($type == 'WH-'){
                    $warehouse_stock = WarehouseStock::where('product_id',$request->item_id[$i])->first();
                    if($warehouse_stock)
                    {
                        $wharehouse_min_stock = $warehouse_stock->quantity + $request->rcv_qty[$i];
                        $warehouse_stock_update = WarehouseStock::where('product_id',$request->item_id[$i])->update([
                            'quantity' => $wharehouse_min_stock ,
                            'purchase_qty' => $request->purchase_qty[$i] + $warehouse_stock->purchase_qty ,
                            'recv_qty' => $request->rcv_qty[$i] + $warehouse_stock->recv_qty,
                            'rest_qty' => $request->rest_qty[$i] + $warehouse_stock->rest_qty,
                        ]);
                    }
                    else{

                        $warehouse_stock_update = WarehouseStock::insert([
                            'warehouses_id' => $storestock ,
                            'product_id' => $request->item_id[$i] ,
                            'invoice' => $invoice ,
                            'quantity' => $request->rcv_qty[$i] ,
                            'purchase_qty' => $request->purchase_qty[$i] ,
                            'recv_qty' => $request->rcv_qty[$i] ,
                            'rest_qty' => $request->rest_qty[$i] ,
                            'created_by' => Auth::User()->name,
                            'uid' => Auth::User()->id,
                            'brid' => Auth::User()->brand_id,
                        ]);
                    }
                }
                $product = Product::where('id',$request->item_id)->update(['min_stock' => $min_stock]);
        endforeach;
        Product_receipt::insert($array);
        return Redirect::route('proreceive-list')->with('success', 'Products Added Successfully...!!!');

    }




    public function show($id)
    {
        $receipt = Product_receipt::findOrfail($id);
        
        $detail = Purchase_detail::where('purchase_track', '=', $receipt->pur_invoice)->get();
         //dd($receipt);
        return view('main.admin.inventory.receive_view',compact('receipt','detail'));
    }
    public function receive_destroy($id)
    {
        
        $receipt = Product_receipt::where('challan_no',$id)->get();
        foreach($receipt as $invoice):
            $products = Product::where('id', $invoice->item_id)->first();
            $stock = $products->min_stock;
            $min_stock = $stock - $invoice->rcv_qty;
            $stock = Purchase::where('pur_invoice',$invoice->pur_invoice)->first();
            $first = filter_var($stock->product_store, FILTER_SANITIZE_NUMBER_INT);
            $storestock = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
            $second=filter_var($stock->product_store, FILTER_SANITIZE_STRING);
            $type= preg_replace("/[^A-Za-z\-]/",'', $second);

            $rqty_stock = Purchase_detail::where('purchase_track',$invoice->pur_invoice)->where('item_id',$invoice->item_id)->get();
            foreach($rqty_stock as $rqty_stocks){
                $rqty = $rqty_stocks->rqty - $invoice->rcv_qty;
            }
           
            $purchase_rqty_update = Purchase_detail::where('purchase_track',$invoice->pur_invoice)->where('item_id',$invoice->item_id)->update([
                'rqty' => $rqty,
            ]);

            if($type == 'BR-')
            {
                $branch_stock = BranchStock::where('product_id',$invoice->item_id)->first();
                if($branch_stock)
                {
                    $branch_min_stock = $branch_stock->quantity - $invoice->rcv_qty;
                    $branch_stock_update = BranchStock::where('product_id',$invoice->item_id)->update([
                        'quantity' => $branch_min_stock ,
                        'purchase_qty' => $branch_stock->purchase_qty -$invoice->purchase_qty  ,
                        'recv_qty' => $branch_stock->recv_qty- $invoice->rcv_qty,
                        'rest_qty' => $branch_stock->rest_qty -$invoice->rest_qty,
                    ]);
                }
            }
            if($type == 'WH-'){
                $warehouse_stock = WarehouseStock::where('product_id',$invoice->item_id)->first();
                if($warehouse_stock)
                {
                    $wharehouse_min_stock = $warehouse_stock->quantity - $invoice->rcv_qty;
                    $warehouse_stock_update = WarehouseStock::where('product_id',$invoice->item_id)->update([
                        'quantity' => $wharehouse_min_stock ,
                        'purchase_qty' =>   $warehouse_stock->purchase_qty -$invoice->purchase_qty ,
                        'recv_qty' =>  $warehouse_stock->recv_qty -$invoice->rcv_qty ,
                        'rest_qty' =>  $warehouse_stock->rest_qty - $invoice->rest_qty,
                    ]);
                }
               
            }
            $product = Product::where('id',$invoice->item_id)->update(['min_stock' => $min_stock]);
    endforeach;

        DB::table('product_receipts')->where('challan_no', $id)->delete();
        return Redirect::route('proreceive-list')->with('success', 'Products Receive Delete Successfully...!!!');
    }
}
