<?php

namespace App\Http\Controllers\Report;

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
use App\Product_delivery;
use Redirect;
use Auth;
use DB;


class purchasereportController extends Controller
{
    public function purchase_list()
    {
      
        if(Auth::User()->brand_id==1){
            $purchase = Purchase::get();
          }else{
            $purchase = Purchase::where('branch_id',Auth::User()->brand_id)->get();                        
          }
          if(Auth::User()->brand_id==1){
            $detail = Purchase_detail::with(['purchase'])->get();
          }else{
            $detail = Purchase_detail::where('branch_id',Auth::User()->brand_id)->with(['purchase'])->get();                       
          }
      
        // dd($purchase->toArray());
        return view('main.admin.report.rep_purpurchaselist',compact('purchase','detail'));
    }

    public function returnPurchaseList()
    {
        if(Auth::User()->brand_id==1){
            $purchase = Purchase::get();
          }else{
            $purchase = Purchase::where('branch_id',Auth::User()->brand_id)->get();                        
          }
          if(Auth::User()->brand_id==1){
            $detail = Purchase_detail::with(['purchase'])->get();
          }else{
            $detail = Purchase_detail::where('branch_id',Auth::User()->brand_id)->with(['purchase'])->get();                       
          }
        // dd($results->toArray());

        return view('main.admin.report.rep_returnpurchaselist',compact('purchase','detail'));
    }
    public function supplierList()
    {
        if(Auth::User()->brand_id==1){
            $suppliers = Supplier::get();
          }else{
            $suppliers = Supplier::where('brid',Auth::User()->brand_id)->get();                       
          }
         
        // dd($suppliers->toArray());
        return view('main.admin.report.rep_purSupplierlist',compact('suppliers'));
    }

    public function itemList()
    {
      
        if(Auth::User()->brand_id==1){
            $results=Purchase_detail::get();
          }else{
            $results=Purchase_detail::where('branch_id',Auth::User()->brand_id)->get();                      
          }
        // $results=Product_delivery::with(['purchase_detail'])->get();
        // dd($results->toArray());
        return view('main.admin.report.rep_purItemList',compact('results'));
    }
    public function itemStList()
    {
        if(Auth::User()->brand_id==1){
            $results=Purchase_detail::get();
          }else{
            $results=Purchase_detail::where('branch_id',Auth::User()->brand_id)->get();                      
          }
        return view('main.admin.report.rep_purItemst',compact('results'));
    }
    public function pur_periodic()
    {
        return view('main.admin.report.rep_purperiodic');
    }
    public function pur_overview()
    {
        return view('main.admin.report.rep_puOverview');
    }
}
