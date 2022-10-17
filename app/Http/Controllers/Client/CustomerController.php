<?php

namespace App\Http\Controllers\Client;

use App\Customer;
use App\District;
use App\Group;
use App\Http\Controllers\Controller;
use App\Zone;
use Illuminate\Http\Request;

use Auth;
use DB;
use Redirect;

class CustomerController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $customers = Customer::with(['group','district','zone'])->get();
          }else{
            $customers = Customer::where('brid',Auth::User()->brand_id)->with(['group','district','zone'])->get();
          }
       
        return view('main.admin.client_setup.customer_list',compact('customers'));
    }
    public function create()
    {
        $groups = Group::get();
        $districts = District::get();
        $zones = Zone::get();
        $cus_track = 'CU-NO-' . Customer::get()->max('id');
        return view('main.admin.client_setup.customer_create',compact('groups','districts','zones','cus_track'));
    }

    public function store(Request $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Customer();
        $input = $request->all();
        $input['uid']= $uid;
        $input['brid']= $brid;
        $store = $data->fill($input)->save();
        if($store){
            return redirect(route('customer-list'))->with('success', 'Data Inserted Successfully');
        }
        
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $groups = Group::get();
        $districts = District::get();
        $zones = Zone::get();
        return view('main.admin.client_setup.customer_edit',compact('groups','districts','zones','customer'));
    }

    public function update(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $update = $customer->update($request->all());
        if($update){
            return redirect(route('customer-list'))->with('success', 'Data Updated Successfully');
        }
        
    }
    public function destroy($id)
    {
        $ids='CU_'.$id;

        $paymentdetails = DB::table('payment_vauchers')
        ->Join('payment_details','payment_details.voucher_no','=','payment_vauchers.voucher_no')
        ->where('payment_details.payment_to',$ids)
        ->get();
        $paymentCount = $paymentdetails->count();
        $receivedetails = DB::table('receive_vouchers')
        ->Join('receive_details','receive_details.voucher_no','=','receive_vouchers.voucher_no')
        ->where('receive_details.receive_from',$ids)
        ->get();
        $receiveCount = $receivedetails->count();
        $salesdetails = DB::table('sales')
        ->Join('sales_details','sales_details.sale_track','=','sales.sales_invoice')
        ->where('sales_details.supplier_id',$id)
        ->get();
        $salesCount = $salesdetails->count();
       
        $check=DB::table('projects')->where('client',$id)->get();
        $checkcount = $check->count();
        
        if(($salesCount >0) || ($checkcount >0) || ($paymentCount >0) || ($receiveCount >0)){

            return Redirect::back()->with('warning', 'Customer Depends on Other table...!!!');  
        }else{
           // dd($checkcount);
            $delete = Customer::findOrFail($id);
            $delete->delete();
            return redirect(route('customer-list'))->with('success', 'Data Deleted Successfully');
        }
       
    }
    public function client_details($id)
    {
        $ids='CU_'.$id;
        //dd($stf_id);
        $paymenttotal = DB::table('payment_details')->where('payment_to',$ids)->get()->sum("amount");
        $paymentdetails = DB::table('payment_vauchers')
        ->Join('payment_details','payment_details.voucher_no','=','payment_vauchers.voucher_no')
        ->where('payment_details.payment_to',$ids)
        ->get();
        $paymentCount = $paymentdetails->count();
        $receivetotal = DB::table('receive_details')->where('receive_from',$ids)->get()->sum("amount");
        $receivedetails = DB::table('receive_vouchers')
        ->Join('receive_details','receive_details.voucher_no','=','receive_vouchers.voucher_no')
        ->where('receive_details.receive_from',$ids)
        ->get();
        $receiveCount = $receivedetails->count();
        $salesdetails = DB::table('sales')
        ->Join('sales_details','sales_details.sale_track','=','sales.sales_invoice')
        ->where('sales_details.supplier_id',$id)
        ->get();

        $journalctotal = DB::table('journal_voucher_details')->where('credit_ledger_id',$ids)->get()->sum("debit_amount");
        $journaldtotal = DB::table('journal_voucher_details')->where('debit_ledger_id',$ids)->get()->sum("debit_amount");
        $journaldetails = DB::table('journal_vouchers')
        ->Join('journal_voucher_details','journal_voucher_details.journal_voucher_id','=','journal_vouchers.id')
        ->where('journal_voucher_details.credit_ledger_id',$ids)
        ->orwhere('journal_voucher_details.debit_ledger_id',$ids)
        ->get();
        
       $salespayabletotal= $salesdetails->sum("payable");
       $salespaidtotal= $salesdetails->sum("paid");
       $salesduetotal= $salesdetails->sum("balance");
        //dd($salestotal);
        $salesCount = $salesdetails->count();
        $debit= $receivetotal+ $salespaidtotal+$journaldtotal;
        $credit=$salespayabletotal + $paymenttotal+$journalctotal;
        $balance=$debit-$credit;

        $data = Customer::findOrFail($id);

        return view('main.admin.client_setup.customer_details',compact('data','paymentCount','salesCount','paymenttotal','paymentdetails','salespayabletotal','salespaidtotal','salesduetotal','salesdetails','salesCount','receivetotal','receivedetails','receiveCount','debit','credit','balance','journaldetails'));
    }
}
