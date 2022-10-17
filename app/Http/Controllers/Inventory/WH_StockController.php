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
use App\Project;
use App\Purchase;
use App\Payment;
use App\Product_receipt;
use Redirect;
use Auth;
use DB;


class WH_StockController extends Controller
{
    public function index()
    {
        $stock = DB::table('warehouse_stocks')
        ->join('products','products.id','=','warehouse_stocks.product_id')
        ->join('warehouses','warehouses.id','=','warehouse_stocks.warehouses_id')
        ->select('*','warehouses.name as warehouse_name','products.name as product_name','products.code','products.avater','products.min_stock')
        ->where('warehouse_stocks.brid',Auth::User()->brand_id)
        ->get();
        // dd($stock->toArray());
        return view('main.admin.inventory.warehouse_stock',compact('stock'));
    }
}
