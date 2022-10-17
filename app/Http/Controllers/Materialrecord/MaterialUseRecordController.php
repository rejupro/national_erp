<?php

namespace App\Http\Controllers\Materialrecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\MaterialCart;
use App\MaterialUse;
use App\Purchase_detail;
use App\Bank;
use App\Employee;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Purchase;
use App\Payment;
use Redirect;
use Auth;
use DB;

class MaterialUseRecordController extends Controller
{
    public function record_create()
    {
        $project = Project::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $product = Product::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $cart = "";
        return view('main.admin.material_use.material_create',compact('project','product','cart'));
    }

    public function record_cart_create(Request $request)
    {
        $item_id = $request->item_id;
        $product = Product::where('id',$request->item_id)->first();
        $cookie_id = request()->cookie('laravel_session');
        $item_name = $product->name;
        $project_id = $request->project_id;
        $project = Project::where('id',$request->project_id)->first();
        $project_name = $project->name;
        $cost = $product->cost;
        $created_by = Auth::User()->name;
        $cart = 1 ;
        return view('main.admin.material_use.material_create',compact('item_id','item_name','cookie_id','item_name','project_id','project_name','created_by','cart','cost'));
    }

    public function store_to_cart(Request $request)
    {
        $record = 'MTRL-USE-' . MaterialUse::get()->max('id');
        // dd($record);
        $input['item_id'] = $request->item_id;
        $input['cookie_id'] = request()->cookie('laravel_session');
        $input['item_name'] = $request->item_name;
        $input['cost'] = $request->cost;
        $input['quantity'] = $request->quantity;
        $input['price'] = $request->price;
        $input['project_id'] = $request->project_id;
        $input['project_name'] = $request->project_name;
        $input['freight_amount'] = $request->freight_amount;
        $input['created_by'] = Auth::User()->name;
        $input['uid'] = Auth::User()->id;
        $input['brid'] = Auth::User()->brand_id;
        $data = DB::table('material_carts')->insert($input);
        $input['record_no'] = $record;
        $data1 = MaterialUse::insert($input);
        return Redirect::route('view_material-record-list')->with('success', 'Product Choosed To Cart Successfully...!!!');

    }

    public function cart_list()
    {
        $inv = MaterialCart::orderBy('created_at','asc')->get();
        // dd($inv);
        return view('main.admin.material_use.material_list',compact('inv'));
    }

    public function checkout_page()
    {
        $recrd = MaterialUse::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $employee = Employee::where('wbrid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        $data = MaterialCart::orderBy('created_at','desc')->first();
        $data1 = MaterialUse::orderBy('created_at','desc')->first();
        $record_no = $data1->record_no;
        $cookie_id = $data->cookie_id;
        return view('main.admin.material_use.material_checkout',compact('recrd','employee','record_no','cookie_id'));
    }

    public function record_store(Request $request)
    {
        $record_no = $request->record_no;
        $input['cookie_id'] = $request->cookie_id;
        $input['send_person_id'] = $request->send_person_id;
        $input['challan_date'] = $request->challan_date;
        $employee = Employee::where('id',$request->send_person_id)->first();
        $input['send_person_name'] = $employee->name;
        $input['ref'] = $request->ref;
        $input['note'] = $request->note;
        // dd($input);
        $data = MaterialUse::where('record_no',$record_no)->update($input);
        $records = MaterialCart::where('cookie_id',$request->cookie_id)->get();
            $array = [];
        foreach($records as $i => $record):
            // dd($records->toArray());
            $product = Product::where('id',$record->item_id)->first();
            // dd($record->toArray());
            $array = [ 'min_stock' => $product->min_stock - $record->quantity,];
            $update = Product::where('id',$record->item_id)->update($array);
        endforeach;
        $cart_remove = MaterialCart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();

        return redirect(route('view_material-cart_list'))->withErrors(['Product Choosed To Cart Successfully...!!!']);

    }

    public function show($id)
    {
        $materials = MaterialUse::get();
        // dd($materials->toArray());
        return view('main.admin.material_use.material_view',compact('materials'));
    }

    public function record_list()
    {
        $use = DB::table('material_uses')->where('brid',Auth::User()->brand_id)->get();
        return view('main.admin.material_use.use_record',compact('use'));
    }
    public function destroy($id)
    {
        
            $matrial = MaterialUse::findOrFail($id);
            $matrial->delete();
            return redirect(route('view_material-record-list'))->withErrors(['Material Use Record Delete Successfully...!!!']);
       
    }

}
