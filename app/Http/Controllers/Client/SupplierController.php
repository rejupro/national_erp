<?php

namespace App\Http\Controllers\Client;

use App\C_Group;
use App\Http\Controllers\Controller;
use App\Product;
use App\Supplier;
use App\Zone;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;

class SupplierController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $suppliers = Supplier::get();
        }else{
            $suppliers = Supplier::where('brid',Auth::User()->brand_id)->get();
        }
        return view('main.admin.client_setup.supplier_list',compact('suppliers'));
    }
    public function create()
    {
        $zones = Zone::get();
        $groups = C_Group::get();
        $sup_track = 'SU-NO-' . Supplier::get()->max('id');
        return view('main.admin.client_setup.supplier_create',compact('zones','groups','sup_track'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'code' => 'required',
            'address' => 'required',
        ]);
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Supplier();
        $input = $request->all();
        $input['uid']= $uid;
        $input['brid']= $brid;
        $store = $data->fill($input)->save();
        if($store){
            return redirect(route('supplier-list'))->with('success','Data inserted successfully');
        }
        
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $zones = Zone::get();
        $groups = C_Group::get();
        return view('main.admin.client_setup.supplier_edit',compact('supplier','zones','groups'));
    }
    public function update(Request $request,$id)
    {
        $supplier = Supplier::findOrFail($id);
        $update = $supplier->update($request->all());
        if($update){
            return redirect(route('supplier-list'))->with('success','Data Updated successfully');
        }
        
    }
    public function destroy($id)
    {
        $ids='SU_'.$id;

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
        $salesdetails = DB::table('purchases')
        ->Join('purchase_details','purchase_details.purchase_track','=','purchases.pur_invoice')
        ->where('purchase_details.supplier_id',$id)
        ->get();
        $salesCount = $salesdetails->count();
       
        
        if(($salesCount >0) || ($paymentCount >0) || ($receiveCount >0)){

            return Redirect::back()->with('warning', 'Supplier Depends on Other table...!!!');  
        }else{
           //dd($salesCount);
            $delete = Supplier::findOrFail($id);
            $delete->delete();
            return redirect(route('supplier-list'))->with('success','Data Deleted successfully');
        }
    }
    public function supplier_details($id)
    {
        $ids='SU_'.$id;
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
        $salesdetails = DB::table('purchases')
        ->Join('purchase_details','purchase_details.purchase_track','=','purchases.pur_invoice')
        ->where('purchase_details.supplier_id',$id)
        ->get();

        $journaldetails = DB::table('journal_vouchers')
        ->Join('journal_voucher_details','journal_voucher_details.journal_voucher_id','=','journal_vouchers.id')
        ->where('journal_voucher_details.credit_ledger_id',$ids)
        ->orwhere('journal_voucher_details.debit_ledger_id',$ids)
        ->get();
        
        $journalctotal = DB::table('journal_voucher_details')->where('credit_ledger_id',$ids)->get()->sum("debit_amount");
        $journaldtotal = DB::table('journal_voucher_details')->where('debit_ledger_id',$ids)->get()->sum("debit_amount");
        
       $salespayabletotal= $salesdetails->sum("payable");
       $salespaidtotal= $salesdetails->sum("paid");
       $salesduetotal= $salesdetails->sum("balance");
        //dd($salestotal);
        $salesCount = $salesdetails->count();
        $credit= $paymenttotal+ $salespaidtotal+ $journalctotal;
        $debit=$salespayabletotal + $receivetotal+$journaldtotal;
        $balance=$debit-$credit;
        $data = Supplier::findOrFail($id);

        return view('main.admin.client_setup.supplier_details',compact('data','paymentCount','salesCount','paymenttotal','paymentdetails','salespayabletotal','salespaidtotal','salesduetotal','salesdetails','salesCount','receivetotal','receivedetails','receiveCount','debit','credit','balance','journaldetails'));
    }
}
