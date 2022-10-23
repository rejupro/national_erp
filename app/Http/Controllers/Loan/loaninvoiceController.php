<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Loaninvoice;
use App\Loan;
use Auth;
Use DB;

class loaninvoiceController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $loaninvoice= Loaninvoice::get();
        }else{
            $loaninvoice= Loaninvoice::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
       
        return view('main.admin.loan.loan_inv_list',compact('loaninvoice'));
    }

    public function create()
    {
        if(Auth::User()->brand_id==1){
            $loanid= Loan::get();
        }else{
            $loanid= Loan::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
       

        $loaninv_track = 'L-INO-' . Loaninvoice::get()->max('id');
        return view('main.admin.loan.loan_inv_create',compact('loaninv_track','loanid'));
    }

    public function store(Request $request)
    {

        if($request->loan_id) {
            $loan = Loan::where('code', $request->loan_id)->first();
            $loan_total = ($loan->balance + $request->total);
            $bal_update['balance'] = $loan_total;
            $update = Loan::where('code', $request->loan_id)->update($bal_update);
        }

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Loaninvoice();
        $input = $request->all();
        $input['status']= 'Unpaid';
        $input['uid']= $uid;
        $input['brid']= $brid;
        $data->fill($input)->save();
        return redirect(route('loaninvoice-list-route'))->with('success', 'Data Inserted Successfully');
    }
    public function edit($id)
    {
        $loaninvoice = Loaninvoice::find($id);
        return view('main.admin.loan.loan_inv_edit',compact('loaninvoice'));
    }

    public function update(Request $request,$id)
    {
        $loan = Loaninvoice::findOrFail($id);
        $loan->update($request->all());
        return redirect(route('loaninvoice-list-route'))->with('success', 'Data Updated Successfully');;
    }
    public function destroy($id)
    {
        $loan = Loaninvoice::findOrFail($id);
        
        $payment = DB::table('payment_details')->where('payment_to', $id)->get();
        $checkcount1 = $payment->count();
        $receive = DB::table('receive_details')->where('receive_from', $id)->get();
        $checkcount2 = $receive->count();
        //dd($receive);
        if(($checkcount1 > 0) || ($checkcount2 > 0)){
            return redirect(route('loaninvoice-list-route'))->with('warning', 'Delete  Unsuccessful Cause Of Data Dependencey...!!!');
        }else{
          
            $loan->delete();
            return redirect(route('loaninvoice-list-route'))->with('success', 'Data Delete Successfully...!!!');
            
        }
    }
}
