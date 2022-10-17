<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Loan;
use App\Loaninvoice;
use Auth;
use DB;

class loanController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $loan= Loan::get();
        }else{
            $loan= Loan::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
       
        return view('main.admin.loan.loan_list',compact('loan'));
    }

    public function create()
    {
        $loan_track = 'L-NO-' . Loan::get()->max('id');
        return view('main.admin.loan.loan_create',compact('loan_track'));
    }

    public function store(Request $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Loan();
        $input = $request->all();
        $input['uid']= $uid;
        $input['brid']= $brid;
        $data->fill($input)->save();
        return redirect(route('loan-list-route'))->with('success', 'Loan Create Successfully');
    }
    public function edit($id)
    {
        $loan = Loan::find($id);
        return view('main.admin.loan.loan_edit',compact('loan'));
    }

    public function update(Request $request,$id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update($request->all());
        return redirect(route('loan-list-route'))->with('success', 'Loan Updated Successfully');
    }
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);

        $loaninvoice = DB::table('loaninvoices')->where('loan_id',$loan->code)->get();
        $checkcount1 = $loaninvoice->count();
        //dd($receive);
        if($checkcount1 > 0){
            return redirect(route('loan-list-route'))->with('warning', 'Delete  Unsuccessful Cause Of Data Dependencey...!!!');
        }else{
          
            $loan->delete();
            return redirect(route('loan-list-route'))->with('success', 'Data Delete Successfully...!!!');
            
        }
        
    }
}
