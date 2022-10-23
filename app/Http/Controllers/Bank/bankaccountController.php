<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Bankaccount;
use Redirect;
use App\Bank;
use Auth;

class bankaccountController extends Controller
{
    public function create_bankaccount()
    {
          $datas=Bank::orderBy('created_at')->get();
      
    	return view('main.admin.bank.bankaccount_create',compact('datas'));
    }
    public function list_bankaccount ()
    {
        if(Auth::User()->brand_id==1){
    	 $datas = Bankaccount::with(['bank'])->orderBy('created_at','desc')->get();
        }else{
            $datas = Bankaccount::where('brid',Auth::User()->brand_id)->with(['bank'])->orderBy('created_at','desc')->get(); 
        }


    	return view('main.admin.bank.bankaccount_list',compact('datas'));
    }

    public function store_bankaccount(Request $request){
    	
        $request->validate([
            'bid' => 'required',
            'acc_no' => 'unique:bankaccounts|required',
            'acc_title' => 'required',
            'bbrname' => 'required'
        ]);

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Bankaccount();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('create-bankaccount-list'))->with('success', 'Data Added Successfully...!!!');
    }
    public function bankaccount_edit($id)
    {
        $datas=Bank::orderBy('created_at')->get();
    	$data = Bankaccount::findOrFail($id);
    	return view('main.admin.bank.bankaccount_edit',compact('data','datas'));
    }

    public function update_bankaccount(Request $request,$id)
    {
    	$request->validate([
            'bid' => 'required',
            'acc_no' => 'required',
            'acc_title' => 'required',
            'bbrname' => 'required'
        ]);

        $data = Bankaccount::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    }

    public function bankaccount_destroy($id)
    {
        $data = Bankaccount::findOrFail($id);
        $data->delete();
        return Redirect::back()->with('success', 'Data Deleted Successfully...!!!');
    } 
}
