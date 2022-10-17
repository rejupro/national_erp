<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Customer;
use App\Product;
use App\Sales_cart;
use App\Sales_detail;
use App\Bank;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Sale;
use App\Sales_payment;
use App\Color;
use App\Size;
use Redirect;
use Auth;
use DB;
Use Str;

class salesController extends Controller
{
    public function sales_index()
    {
        if(Auth::User()->brand_id==1){
            $sale = Sale::with(['project'])->get();
        }else{
            $sale =Sale::with(['project'])->where('branch_id',Auth::User()->brand_id)->get();
        }
        // dd($purchase);
        return view('main.admin.sales.sales_list',compact('sale'));
    }

    public function sales_create()
    {

        $cookie_id = Str::random(8);
        $invoice = 'SALE-VNO-00' . Sales_detail::get()->max('id');

        $supplier = Customer::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
       // $product = Product::orderBy('created_at','desc')->get();
        $color = Color::orderBy('created_at','desc')->get();
        $size = Size::orderBy('created_at','desc')->get();
        $cart = DB::table('sales_carts')
            ->join('products','products.id','=','sales_carts.item_id')
            ->select('sales_carts.*','products.name as product_name','products.id as product_id')
            ->where('cookie_id',request()->cookie('laravel_session'))
            ->orderBy('id','asc')
            ->get();
        $product = DB::table('branch_stocks')
        ->join('products','products.id','=','branch_stocks.product_id')
        ->join('branches','branches.id','=','branch_stocks.branch_id')
        ->select('*','branches.name as branch_name','products.name as product_name','products.id as product_id','products.code','products.avater')
        ->where('branch_stocks.brid',Auth::User()->brand_id)
        ->get();
        return view('main.admin.sales.sales_create',compact('size','supplier','product','cookie_id','color','cart','invoice'));
    }


    public function search_product(Request $request)
    {
        $str = '';
        $product = DB::table('branch_stocks')
        ->join('products','products.id','=','branch_stocks.product_id')
        ->join('branches','branches.id','=','branch_stocks.branch_id')
        ->select('*','branches.name as branch_name','products.name as product_name','products.id as product_id','products.code','products.avater')
        ->where('products.name', 'like',$request->id . '%')
        ->where('branch_stocks.brid',Auth::User()->brand_id)
        ->get();
       // $product = Product::where('name', 'like',$request->id . '%')->get();
        if ($product){
            foreach ($product as $products){
                $str .='<div class="product-content product-select puritem" id="AX_1" title="Brick">
                                    <img src="'.asset($products->avater).'" class="product-image">
                                    <div class="info">
                                        <h3>'.$products->quantity.' Pcs</h3>
                                        <p>'.$products->cost.' BDT</p>
                                    </div>
                                    <div class="product-detail">
                                        <b class="name">'.$products->product_name.'</b>
                                    </div><div class="product-code">
                                        <b class="sku">'.$products->code.'</b>
                                        <b class="indexg" style="display:none;">'.$products->pur_scan.'</b>
                                    </div>
                                </div>';
            }
        }

        echo $str;
    }

    public function search_product_title(Request $request)
    {
        $str = '';
        $product = DB::table('branch_stocks')
        ->join('products','products.id','=','branch_stocks.product_id')
        ->join('branches','branches.id','=','branch_stocks.branch_id')
        ->select('*','branches.name as branch_name','products.name as product_name','products.id as product_id','products.code','products.avater')
        ->where('products.name', 'like',$request->id . '%')
        ->where('branch_stocks.brid',Auth::User()->brand_id)
        ->get();
        if ($product){
            foreach ($product as $products){
                $str .='<div class="product-content product-select puritem" id="AX_1" title="Brick">
                            <img src="'.asset($products->avater).'" class="product-image">
                            <div class="info">
                                <h3>'.$products->quantity.' Pcs</h3>
                                <p>'.$products->cost.' BDT</p>
                            </div>
                            <div class="product-detail">
                                <b class="name">'.$products->product_name.'</b>
                            </div><div class="product-code">
                                <b class="sku">'.$products->code.'</b>
                                <b class="indexg" style="display:none;">'.$products->pur_scan.'</b>
                            </div>
                        </div>';
            }
        }

        echo $str;
    }

    public function search_product_name_code(Request $request)
    {
        $str = '';
        $product = DB::table('branch_stocks')
        ->join('products','products.id','=','branch_stocks.product_id')
        ->join('branches','branches.id','=','branch_stocks.branch_id')
        ->select('*','branches.name as branch_name','products.name as product_name','products.id as product_id','products.code','products.avater')
        ->where('products.name', 'like', '%'. $request->id .'%')->orWhere('products.code', 'like', '%'. $request->id .'%')
        ->where('branch_stocks.brid',Auth::User()->brand_id)
        ->get();
        //$product = Product::where('name', 'like', '%'. $request->id .'%')->orWhere('code', 'like', '%'. $request->id .'%')->get();
        if ($product){
            foreach ($product as $products){
                $str .='<div class="product-content product-select puritem" id="AX_1" title="Brick">
                        <img src="'.asset($products->avater).'" class="product-image">
                        <div class="info">
                            <h3>'.$products->quantity.' Pcs</h3>
                            <p>'.$products->cost.' BDT</p>
                        </div>
                        <div class="product-detail">
                            <b class="name">'.$products->product_name.'</b>
                        </div><div class="product-code">
                            <b class="sku">'.$products->code.'</b>
                            <b class="indexg" style="display:none;">'.$products->pur_scan.'</b>
                        </div>
                    </div>';
            }
        }

        echo $str;
    }

    public function add_to_sales_cart(Request $request)
    {
        $input['item_id'] = $request->id;
        $product = Product::where('id',$request->id)->first();
        $input['cookie_id'] = request()->cookie('laravel_session');
        $input['item_name'] = $product->name;
        $input['cost'] = $product->cost;
        $input['quantity'] = 1;
        $input['created_by'] = Auth::User()->name;

        $prods = DB::table('sales_carts')
        ->where('item_id',$request->id)
        ->where('cookie_id',request()->cookie('laravel_session'))
        ->where('created_by',Auth::User()->name)
        ->count('item_id');
        if($prods > 0){
            $input['quantity'] = $prods->quantity + 1;
            $data = DB::table('sales_carts')
            ->where('cookie_id',request()->cookie('laravel_session'))
            ->where('item_id',$request->id)
            ->where('created_by',Auth::User()->name)
            ->update($input);
        }else{
            $data = DB::table('sales_carts')->insert($input);
        }


       
        $cart = DB::table('sales_carts')
            ->join('products','products.id','=','sales_carts.item_id')
            ->select('sales_carts.*','products.name as product_name')
            ->where('cookie_id',request()->cookie('laravel_session'))
            ->orderBy('id','asc')
            ->get();
        $i=0;
        $str = '';
        if ($cart){
            foreach ($cart as $products){
                $i=$i+1;
                $str .='<tr>
                            <input type="hidden" name="item_id" id="item_id'.$id=$products->id.'">
                            <td class="text-center" width="30px"><a href="#" onclick="expand('.$id=$products->id.')">'.$i.'</a></td>
                            <td class="accordion-toggle" style="cursor: pointer;" width="190px"><a href="#"  onclick="collaps('.$id=$products->id.')">'. $products->item_name .'</a></td>
                            <td width="60px">
                                <input type="text" min="1" onchange="product_sub_total_with_quantity('.$id=$products->id.')" class="form-control quantity" id="quantity'.$products->id.'" name="quantity" value="1" size="2" style="height: 24px;">
                            </td>
                            <td width="60px">
                                <input type="text" min="1" class="form-control cost" id="cost'.$products->id.'" value="'.$products->cost.'" size="2" style="height: 24px;">
                            </td>
                            <td class="text-center" width="35px">
                                <input type="checkbox" class="asl" id="asl" value="1" checked="checked" name="radio-group">
                            </td>
                            <td width="65px" class="text-right">
                                <input type="text" class="form-control price" id="price'.$products->id.'" value="0" name="price" size="2" style="height: 24px;">
                            </td>
                            <td width="60px">
                                <input type="text" min="1" class="form-control price" id="grand_total'.$products->id.'" name="grand_total" value="'.$products->cost.'" onchange="product_grand_total('.$id=$products->id.')" size="2" style="height: 24px;">
                            </td>
                            <td class="text-center" width="25px">
                                <a href="#" onclick="remove_from_cart('.$id=$products->id.')" class="remove">
                                    <span style="cursor: pointer;" class="fa fa-times"></span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" class="" id="sub_table'.$id=$products->id.'">
                                <div class="accordian-body" id="pitem'.$id=$products->id.'">
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Purchase Discount</th>
                                                <th rowspan="2" class="text-center">Warranty Days</th>
                                                <th colspan="2" class="text-center">Sales Discount</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Percent(%)</th>
                                                <th class="text-center">Fixed</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Percent(%)</th>
                                                <th class="text-center">Fixed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" min="0" class="form-control disp" id="pur_discount'.$products->id.'" value="0" onchange="product_sub_total_with_quantity('.$id=$products->id.')" size="2" style="height: 24px;">
                                                </td>
                                                <td>
                                                    <input type="text" min="0" class="form-control disf" id="pur_discount_amount'.$products->id.'" value="0" onchange="product_sub_total_with_quantity('.$id=$products->id.')" size="2" style="height: 24px;">
                                                </td>
                                                <td id="pur_discount_amount'.$products->id.'" class="text-right">0</td>
                                                <td>
                                                    <input type="text" min="1" class="form-control wdays" id="warranty'.$products->id.'" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td>
                                                    <input type="text" min="0" id="sal_discount'.$products->id.'" class="form-control sdisp"value="0" onchange="product_sub_total_with_quantity('.$id=$products->id.')" size="2" style="height: 24px;">
                                                </td>
                                                <td>
                                                    <input type="text" min="0" id="sal_discount_amount'.$products->id.'" class="form-control sdisf" onchange="product_sub_total_with_quantity('.$id=$products->id.')" value="0" size="2" style="height: 24px;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>';
            }
        }

        echo $str;

        return Redirect::route('sales-create-page');
    }

    public function add_purchase(Request $request)
    {
        $supplier = Customer::where('id',$request->supplier_id)->first();
        $cart = array(
            $request->purchase_track,
            $request->supplier_id,
            $supplier->name,
            $request->pur_bar_code,
            $request->item_id,
            $request->item_name,
            $request->quantity,
            $request->cost,
            $request->asl,
            $request->price,
            $request->grand_total,
            $request->col_id,
            $request->size_id,
            $request->pur_discount,
            $request->pur_discount_amount,
            $request->warranty,
            $request->sal_discount,
            $request->sal_discount_amount,
            $request->discount,
            $request->discount_amount,
            $request->vat,
            $request->vat_amount,
            $request->tax,
            $request->tax_amount,
            $request->ait,
            $request->others_amount,
            $request->speed_money_amount,
            $request->freight_amount,
            $request->fraction_discount_amount,
            $request->final_grand_total,
        );
        $count=count($cart[5]);
        $input = [];
        $in = 0;
        for($in; $in<$count; $in++):
            $supplier = Customer::where('id',$request->supplier_id)->first();
            $array[] = [
                'sale_track' => $request->purchase_track,
                'supplier_id' => $request->supplier_id,
                'supplier_name' => $supplier->name,
                'pur_bar_code' => $request->pur_bar_code,
                'item_id' => $request->item_id[$in],
                'item_name' => $request->item_name[$in],
                'quantity' => $request->quantity[$in],
                'cost' => $request->cost[$in],
                'asl' => $request->asl[$in],
                'price' => $request->price[$in],
                'total' => $request->grand_total[$in],
                'color_id' => $request->col_id[$in],
                'size_id' => $request->size_id[$in],
                'pur_discount' => $request->pur_discount[$in],
                'pur_discount_amount' => $request->pur_discount_amount[$in],
                'warranty' => $request->warranty[$in],
                'sal_discount' => $request->sal_discount[$in],
                'sal_discount_amount' => $request->sal_discount_amount[$in],
                'discount' => $request->discount,
                'discount_amount' => $request->discount_amount,
                'vat' => $request->vat,
                'vat_amount' => $request->vat_amount,
                'tax' => $request->tax,
                'tax_amount' => $request->tax_amount,
                'ait' => $request->ait,
                'other_amount' => $request->others_amount,
                'speed_money_amount' => $request->speed_money_amount,
                'freight_amount' => $request->freight_amount,
                'fraction_discount_amount' => $request->fraction_discount_amount,
                'grand_total' => $request->final_grand_total,
                'branch_id' => Auth::User()->brand_id,
                'created_by' => Auth::User()->name,
                'cookie_id' => request()->cookie('laravel_session'),
                'status' => 0
            ];
        endfor;
        $store_sale_details = Sales_detail::insert($array);

        return Redirect::route('view_sales_checkout_page')->with('success', 'Data Inserted Successfully');
        // $cart_remove = Sales_cart::where('cookie_id',request()->cookie('laravel_session'))->delete();
    }

    public function update_to_sales_cart(Request $request)
    {
        $input['item_id'] = $request->item_id;
        // $input['id'] = $request->id;
        $product = Sales_cart::where('id',$request->id)->first();
        $input['cookie_id'] = request()->cookie('laravel_session');
        $input['item_name'] = $product->item_name;
        $input['cost'] = $product->cost;
        $input['quantity'] = $request->quantity;
        $input['price'] = $request->price;
        $input['total'] = $request->total;
        $input['discount'] = $request->discount;
        $input['discount_amount'] = $request->discount_amount;
        $input['vat'] = $request->vat;
        $input['vat_amount'] = $request->vat_amount;
        $input['tax'] = $request->tax;
        $input['tax_amount'] = $request->tax_amount;
        $input['ait'] = $request->ait;
        $input['ait_amount'] = $request->ait_amount;
        $input['other_amount'] = $request->other_amount;
        $input['speed_money_amount'] = $request->speed_money_amount;
        $input['freight_amount'] = $request->freight_amount;
        $input['fraction_discount_amount'] = $request->fraction_discount_amount;
        $input['grand_total'] = $request->grand_total;
        $input['created_by'] = Auth::User()->name;
        $data = DB::table('sales_carts')->where('id', $request->id)->where('cookie_id',$input['cookie_id'])->update($input);
        if(Auth::User()->name == $product->created_by && $input['cookie_id'] == $product->cookie_id)
        {
            $supplier = Supplier::where('id',$request->supplier_id)->first();
            $inv = Sales_detail::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
            if($inv){
                $sale = Sales_detail::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
                $sale_t = $sale->sale_track;
            }
            else{
                $sale_t = 'SALE-VNO-' . Sales_detail::get()->max('id');
            }

            $sale_track = $sale_t;
            $input['sale_track'] = $sale_track;
            $input['company_name'] = $product->company_name;
            $input['supplier_id'] = $request->supplier_id;
            $input['supplier_name'] = $supplier->name;
            $input['color'] = $product->color;
            // dd($input);
            $insert = DB::table('sales_details')->insert($input);
        }
        else{

            $supplier = Supplier::where('id',$request->supplier_id)->first();
            $sale_track = 'PRCS-VNO-' . Sales_detail::get()->max('id');
            $input['sale_track'] = $sale_track;
            $input['company_name'] = $product->company_name;
            $input['supplier_id'] = $request->supplier_id;
            $input['supplier_name'] = $supplier->name;
            $input['color'] = $product->color;
            $insert = DB::table('sales_details')->insert($input);
        }
        return Redirect::route('view_sales_cart_list')->with('success', 'Products Added To Sales Cart Successfully...!!!');
    }

    public function view_sales_cart()
    {
        $inv = Sales_detail::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
        $clear = Sales_cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();

        //add this variable and condition
        $sales_cart = [];
        if($inv):
            $sales_cart = Sales_detail::orderBy('created_at','asc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->where('sale_track', $inv->sale_track)->get();
        endif;
        return view('main.admin.sales.cart_details',compact('sales_cart'));
    }
    public function sales_checkout_page()
    {
        $last_id = Sales_detail::where('cookie_id',request()->cookie('laravel_session'))->get()->max('id');
        $sales = Sales_detail::where('id',$last_id)->first();
        $sales_cart = Sales_detail::orderBy('created_at','asc')->where('sale_track',$sales->sale_track)->get();
        $invoice = $sales->sale_track;
        $cusid = $sales->supplier_id;

        $bank = Bank::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $mob_acc = Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $branch = Branch::orderBy('created_at','desc')->get();
        $w_house = Warehouse::orderBy('created_at','desc')->get();
        $project = Project::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $clear = Sales_cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();
        return view('main.admin.sales.sales_checkout',compact('sales','sales_cart','invoice','bank','mob_acc','branch','w_house','project','cusid'));
    }

    public function sales_store(Request $request)
    {
        $input['sales_invoice'] = $request->sales_invoice;
        $input['payable'] = $request->payable;
        $input['paid'] = $request->paid;
        $input['balance'] = $request->balance;
        $input['sales_date'] = $request->sales_date;
        $input['next_date'] = $request->next_date;
        $input['product_store'] = $request->product_store;
        $input['ref'] = $request->ref;
        $input['created_by'] = $request->created_by;
        $input['project_id'] = $request->project_id;
        $input['cusid'] = $request->cusid;
        $input['note'] = $request->note;
        $input['lc_no'] = $request->lc_no;
        $input['pi_no'] = $request->pi_no;
        $input['lc_value'] = $request->lc_value;
        $input['lc_date'] = $request->lc_date;
        $input['pi_date'] = $request->pi_date;
        $input['lc_bank'] = $request->lc_bank;
        $input['branch_id'] = Auth::User()->brand_id;
        $order = DB::table('sales')->insertGetId($input);
        $inputs['sales_invoice'] = $request->sales_invoice;
        $inputs['order_no'] = $order;
        $inputs['payable'] = $request->payable;
        $inputs['paid'] = $request->paid;
        $inputs['due'] = $request->due;
        $inputs['balance'] = $request->balance;
        $inputs['sales_date'] = $request->sales_date;
        $inputs['bank_id'] = $request->bank_id;
        $inputs['cheque_no'] = $request->cheque_no;
        $inputs['cheque_date'] = $request->cheque_date;
        $inputs['caname'] = $request->caname;
        $inputs['chbid'] = $request->chbid;
        $inputs['w_bid'] = $request->w_bid;
        $inputs['mobid'] = $request->mobid;
        $inputs['trxid'] = $request->trxid;
        $inputs['branch_id'] = Auth::User()->brand_id;
        $inputs['created_by'] = $request->created_by;
        $payment = Sales_payment::insert($inputs);

        return Redirect::route('sales-list-page')->with('success', 'Sales Added Successfully...!!!');
    }

    public function show($id)
    {
        $results = Sale::with(['project'])->findOrFail($id);
        $list=Sale::where('branch_id',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $data = Sales_detail::with(['product'])->where('sale_track', '=', $results->sales_invoice)->get();
        $details = Sales_detail::with(['product','supplier'])->where('sale_track', '=', $results->sales_invoice)->first();
        //dd($details);
        return view('main.admin.sales.sales_view',compact('results','details','data','list'));
    }
    public function delete_sales_cart(Request $request)
    {
        $id = $request->id;
        $cart = Sales_cart::where('id',$id)->delete();
        $cart = DB::table('sales_carts')->where('cookie_id',request()->cookie('laravel_session'))->orderBy('id','asc')->get();
        return Redirect::route('sales-create-page');
    }
    public function edit_sales_cart($id)
    {
        $supplier = Supplier::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $product = Product::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $sales_cart = Sales_detail::where('id',$id)->first();
        return view('main.admin.sales.cart_edit',compact('sales_cart','supplier','product'));
    }
    public function sales_destroy($id)
    {     
        $check=DB::table('product_deliverys')->where('sales_invoice',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->withErrors(['Sales Depends on Other table...!!!']);  
        }else{
            DB::table('sales_payments')->where('sales_invoice', $id)->delete();
            DB::table('sales')->where('sales_invoice', $id)->delete();
            DB::table('sales_details')->where('sale_track', $id)->delete();
            return redirect(route('sales-list-page'))->withErrors(['Sales Delete Successfully...!!!']);
        }  
           
    }
}
