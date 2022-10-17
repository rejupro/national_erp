<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mobileaccount;
use Datatables;
use Redirect;

Use Auth;

class mobileaccountController extends Controller
{
    public function create_mobileaccount()
    {
    	return view('main.admin.bank.mobileaccount_create');
    }
    
    public function list_maccount()
    {
        if(Auth::User()->brand_id==1){
            $datas = Mobileaccount::orderBy('created_at','desc')->get();
           }else{
            $datas = Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
           }
    	
    	return view('main.admin.bank.mobileaccount_list',compact('datas'));
    }

    public function store_mobileaccount(Request $request){
    	
        $request->validate([
            'mname' => 'required',
            'mobile' => 'required'
        ]);

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Mobileaccount();
        $input = $request->all();

        $input['uid']= $uid;
        $input['brid']= $brid;
        $data->fill($input)->save();
    	
    	return Redirect()->route('mobileaccount-list')->with('success', 'Mobile Account Added Successfully');
    }
    public function mobileaccount_edit($id)
    {
    	$data = Mobileaccount::findOrFail($id);
    	return view('main.admin.bank.mobileaccount_edit',compact('data'));
    }

    public function update_mobileaccount(Request $request,$id)
    {
    	$request->validate([
            'mname' => 'required',
            'mobile' => 'required'
        ]);

        $data = Mobileaccount::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    }

    public function mobileaccount_destroy($id)
    {
        $data = Mobileaccount::findOrFail($id);
        $data->delete();
        return Redirect::back()->with('success', 'Data Deleted Successfully...!!!');
    } 
}
