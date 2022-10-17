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
use App\Customer;
use App\Project;
use App\Purchase;
use App\Payment;
use App\Product_delivery;
use App\Sale;
use App\Sales_detail;
use Redirect;
use Auth;
use DB;


class salesreportcontroller extends Controller
{
    public function sales_list()
    {
       
      
        if(Auth::User()->brand_id==1){
            $sales = Sale::get();
          }else{
            $sales = Sale::where('branch_id',Auth::User()->brand_id)->get();                       
          }
          if(Auth::User()->brand_id==1){
            $detail = Sales_detail::with(['sale'])->get();
          }else{
            $detail = Sales_detail::where('branch_id',Auth::User()->brand_id)->with(['sale'])->get();                      
          }
    
        return view('main.admin.report.sales_ListReport',compact('sales','detail'));
    }
    public function returnSalesList()
    {
        if(Auth::User()->brand_id==1){
            $sales = Sale::get();
          }else{
            $sales = Sale::where('branch_id',Auth::User()->brand_id)->get();                       
          }
          if(Auth::User()->brand_id==1){
            $detail = Sales_detail::with(['sale'])->get();
          }else{
            $detail = Sales_detail::where('branch_id',Auth::User()->brand_id)->with(['sale'])->get();                      
          }
      
        return view('main.admin.report.sales_returnListReport',compact('sales','detail'));
    }
    public function customerList()
    {
      
        if(Auth::User()->brand_id==1){
            $customer = Customer::get();
          }else{
            $customer = Customer::where('brid',Auth::User()->brand_id)->get();                    
          }
       
        return view('main.admin.report.salesCustomerList',compact('customer'));
    }
    public function salesItemList()
    {
        if(Auth::User()->brand_id==1){
            $results = Sales_detail::with(['sale'])->get();
          }else{
            $results = Sales_detail::where('branch_id',Auth::User()->brand_id)->with(['sale'])->get();                      
          }
        return view('main.admin.report.sales_itemList',compact('results'));
    }

    public function salesItemStList()
    {
        if(Auth::User()->brand_id==1){
            $results = Sales_detail::with(['sale'])->get();
          }else{
            $results = Sales_detail::where('branch_id',Auth::User()->brand_id)->with(['sale'])->get();                      
          }
        return view('main.admin.report.sales_itemStList',compact('results'));
    }
    public function salesPeriodic()
    {
        return view('main.admin.report.sales_periodic');
    }
    public function salesOverview()
    {
        return view('main.admin.report.salesOverview');
    }
}
