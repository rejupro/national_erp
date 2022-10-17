<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Input;
use App\Supplier;
use App\Product;
use App\Cart;
use App\Purchase_detail;
use App\Bank;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Requisition;
use App\Purchase;
use App\Payment;
use App\Color;
use App\Size;
use Redirect;
use Auth;
use DB;
Use Str;

class PurchaseController extends Controller
{
    public function purchase_index()
    {
        //        dd(Auth::User()->brand_id);
        if(Auth::User()->brand_id==1){
            $purchase = Purchase::with(['project'])->orderBy('created_at','desc')->get();
        }else{
            $purchase =Purchase::with(['project'])->where('branch_id',Auth::User()->brand_id)->orderBy('created_at','desc')->get(); 
        }

        return view('main.admin.purchase.purchase_list',compact('purchase'));
    }

    public function purchase_create()
    {
        $last_id = Purchase_detail::get()->max('id');
        $invoice = 'PRCS-VNO-00' . $last_id;
        $cookie_id = Str::random(8);
        $supplier = Supplier::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $product = Product::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();

        $color = Color::orderBy('created_at','desc')->get();
        $size = Size::orderBy('created_at','desc')->get();
        $cart = DB::table('carts')
        ->join('products','products.id','=','carts.item_id')
        ->select('carts.*','products.name as product_name','products.id as product_id')
        ->where('cookie_id',request()->cookie('laravel_session'))
        ->orderBy('id','asc')
        ->get();
        return view('main.admin.purchase.purchase_create',compact('size','supplier','product','cookie_id','color','cart','invoice'));
    }

    public function search_product(Request $request)
    {
        $str = '';
        $product = Product::where('brid',Auth::User()->brand_id)->where('name', 'like',$request->id . '%')->get();
         if ($product){
            foreach ($product as $products){
                $str .='<div class="product-content product-select puritem" id="AX_1" title="Brick">
                                    <img src="'.asset($products->avater).'" class="product-image">
                                    <div class="info">
                                        <h3>'.$products->min_stock.' Pcs</h3>
                                        <p>'.$products->cost.' BDT</p>
                                    </div>
                                    <div class="product-detail">
                                        <b class="name">'.$products->name.'</b>
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
        $product = Product::where('brid',Auth::User()->brand_id)->where('name', 'like',$request->id . '%')->get();
         if ($product){
            foreach ($product as $products){
                $str .='<div class="product-content product-select puritem" id="AX_1" title="Brick">
                                    <img src="'.asset($products->avater).'" class="product-image">
                                    <div class="info">
                                        <h3>'.$products->min_stock.' Pcs</h3>
                                        <p>'.$products->cost.' BDT</p>
                                    </div>
                                    <div class="product-detail">
                                        <b class="name">'.$products->name.'</b>
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
        $product = Product::where('brid',Auth::User()->brand_id)->where('name', 'like', '%'. $request->id .'%')->orWhere('code', 'like', '%'. $request->id .'%')->get();
         if ($product){
            foreach ($product as $products){
                $str .='<div class="product-content product-select puritem" id="AX_1" title="Brick">
                                    <img src="'.asset($products->avater).'" class="product-image">
                                    <div class="info">
                                        <h3>'.$products->min_stock.' Pcs</h3>
                                        <p>'.$products->cost.' BDT</p>
                                    </div>
                                    <div class="product-detail">
                                        <b class="name">'.$products->name.'</b>
                                    </div><div class="product-code">
                                        <b class="sku">'.$products->code.'</b>
                                        <b class="indexg" style="display:none;">'.$products->pur_scan.'</b>
                                    </div>
                                </div>';
            }
        }

        echo $str;
    }

    public function add_to_cart(Request $request)
    {
        $input['item_id'] = $request->id;
        $product = Product::where('id',$request->id)->first();
        $input['cookie_id'] = request()->cookie('laravel_session');
        $input['item_name'] = $product->name;
        $input['cost'] = $product->cost;
        $input['quantity'] = 1;
        $input['price'] = 0;
        $input['grand_total'] = 0;
        $input['created_by'] = Auth::User()->name;
        $prods = DB::table('carts')
        ->where('item_id',$request->id)
        ->where('cookie_id',request()->cookie('laravel_session'))
        ->where('created_by',Auth::User()->name)
        ->count('id');
        // echo "<pre>"; print_r($prods); exit();
        if($prods>0){
            $input['quantity'] = $prods->quantity + 1;
            $data = DB::table('carts')
            ->where('cookie_id',request()->cookie('laravel_session'))
            ->where('item_id',$request->id)
            ->where('created_by',Auth::User()->name)
            ->update($input);
        }else{
            // echo "<pre>"; print_r("Hello"); exit();
            $data = DB::table('carts')->insert($input);
        }
        $cart = DB::table('carts')
        ->join('products','products.id','=','carts.item_id')
        ->select('carts.*','products.name as product_name')
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
                                <input type="text" min="1" onchange="product_sub_total_with_quantity('.$id=$products->id.')" class="form-control quantity" id="quantity'.$products->id.'" name="quantity" value="'.$products->quantity.'" size="2" style="height: 24px;">
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
        return Redirect::route('purchase-create-page');
    }

    public function add_product_details(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
        ]);

        $supplier = Supplier::where('id',$request->supplier_id)->first();
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
            $supplier = Supplier::where('id',$request->supplier_id)->first();
                $array[] = [
                    'purchase_track' => $request->purchase_track,
                    'supplier_id' => $request->supplier_id,
                    'supplier_name' => $supplier->name,
                    'pur_bar_code' => $request->pur_bar_code,
                    'item_id' => $request->item_id[$in],
                    'item_name' => $request->item_name[$in],
                    'quantity' => $request->quantity[$in],
                    'cost' => $request->cost[$in],
                    //'asl' => $request->asl[$in],
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
        $store_purchase_details = Purchase_detail::insert($array);
        $delete = Cart::where('cookie_id',request()->cookie('laravel_session'))
        ->where('created_by',Auth::User()->name)->delete();
        return Redirect::route('view_checkout_page');
    }
    public function checkout_page()
    {
        $requisition = Requisition::get();
        $last_id = Purchase_detail::where('cookie_id',request()->cookie('laravel_session'))->get()->max('id');
        $purchase = Purchase_detail::where('id',$last_id)->first();
        $cart = Purchase_detail::orderBy('created_at','asc')->where('purchase_track', $purchase->purchase_track)->get();
        $invoice = $purchase->purchase_track;
        $supid=$purchase->supplier_id;
        $bank = Bank::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $mob_acc = Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $branch = Branch::orderBy('created_at','desc')->get();
        $w_house = Warehouse::orderBy('created_at','desc')->get();
        $project = Project::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $cart_remove = Cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();
        return view('main.admin.purchase.purchase_checkout',compact('requisition','cart','invoice','bank','mob_acc','branch','w_house','project','purchase','supid'));
    }



    public function view_cart()
    {
        $inv = Purchase_detail::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
        $clear = Cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();

        //add this variable and condition
        $cart = [];
        if($inv):
        $cart = Purchase_detail::orderBy('created_at','asc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->where('purchase_track', $inv->purchase_track)->get();
        endif;
        return view('main.admin.purchase.cart_details',compact('cart'));
    }

    public function purchase_store(Request $request)
    {



        $input['pur_invoice'] = $request->pur_invoice;
        $input['payable'] = $request->payable;
        $input['paid'] = $request->paid;
        $input['balance'] = $request->balance;
        $input['purchase_date'] = $request->purchase_date;
        $input['next_date'] = $request->next_date;
        $input['product_store'] = $request->product_store;
        $input['ref'] = $request->ref;
        $input['created_by'] = $request->created_by;
        $input['project_id'] = $request->project_id;
        $input['supid'] = $request->supid;
        $input['note'] = $request->note;
        $input['lc_no'] = $request->lc_no;
        $input['pi_no'] = $request->pi_no;
        $input['lc_value'] = $request->lc_value;
        $input['lc_date'] = $request->lc_date;
        $input['pi_date'] = $request->pi_date;
        $input['lc_bank'] = $request->lc_bank;
        $input['branch_id'] = Auth::User()->brand_id;
        $order = Purchase::insertGetId($input);
        $inputs['pur_invoice'] = $request->pur_invoice;
        $inputs['payable'] = $request->payable;
        $inputs['paid'] = $request->paid;
        $inputs['balance'] = $request->balance;
        $inputs['purchase_date'] = $request->purchase_date;
        $inputs['created_by'] = $request->created_by;
        // dd($inputs);
        $inputs['caname'] = $request->caname;
        $inputs['chbid'] = $request->chbid;
        $inputs['w_bid'] = $request->w_bid;
        $inputs['mobid'] = $request->mobid;
        $inputs['trxid'] = $request->trxid;
        $inputs['cheque_date'] = $request->cheque_date;
        $inputs['cheque_no'] = $request->cheque_no;
        $inputs['bank_id'] = $request->bank_id;
        $inputs['order_no'] = $order;
        $inputs['due'] = $request->due;
        $inputs['branch_id'] = Auth::User()->brand_id;
        $payment = Payment::insert($inputs);

        return Redirect::route('purchase-list-page')->with('success', 'Purchase Added Successfully...!!!');
    }

    public function show($id)
    {
        $results = Purchase::with(['project'])->findOrFail($id);
        $list=Purchase::where('branch_id',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $data = Purchase_detail::with(['product'])->where('purchase_track', '=', $results->pur_invoice)->get();
        $details = Purchase_detail::with(['product','supplier'])->where('purchase_track', '=', $results->pur_invoice)->first();
        //dd($details);
        // dd($results->toArray());
       // dd( $results);
        return view('main.admin.purchase.purchase_view',compact('results','details','data','list'));
    }
    public function delete_cart(Request $request)
    {
        $id = $request->id;
        $cart = Cart::where('id',$id)->delete();
        $cart = DB::table('carts')->where('cookie_id',request()->cookie('laravel_session'))->orderBy('id','asc')->get();
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
                                <input type="text" min="1" class="form-control price" id="grand_total'.$products->id.'" name="grand_total" value="'.$products->cost.'" size="2" style="height: 24px;">
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

        return Redirect::route('purchase-create-page');
    }
    public function edit_cart($id)
    {
        $supplier = Supplier::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $product = Product::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $cart = Purchase_detail::where('id',$id)->first();
        // dd($cart);
        return view('main.admin.purchase.cart_edit',compact('cart','supplier','product'));
    }
    public function purchase_destroy($id)
    {     
        $check=DB::table('product_receipts')->where('pur_invoice',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Purchase Depends on Other table...!!!');  
        }else{
            DB::table('payments')->where('pur_invoice', $id)->delete();
            DB::table('purchases')->where('pur_invoice', $id)->delete();
            DB::table('purchase_details')->where('purchase_track', $id)->delete();
            return redirect(route('purchase-list-page'))->with('success', 'Purchase Delete Successfully...!!!');
        }  
           
    }




    // ajax cart show
    public function ajax_cartdata(){
        $cart = DB::table('carts')
        ->join('products','products.id','=','carts.item_id')
        ->select('carts.*','products.name as product_name','products.id as product_id')
        ->where('cookie_id',request()->cookie('laravel_session'))
        ->orderBy('id','asc')
        ->get();
        return response()->json(array(
            'data' => $cart,
        ));
    }

    public function ajax_cartdataupdate($id, Request $request){
        $data = Cart::findOrFail($id);
        $data->quantity = $request->quantity;
        $data->cost = $request->cost;
        $data->price = $request->price;
        $data->grand_total = $request->grand_total;
        $data->save();
        return response()->json(['success' => 'Successfully Updated on Database']);

    }







}
