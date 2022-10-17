<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Bank;
use Redirect;
use Auth;

class bankController extends Controller
{    
    public function create_bank()
    {
    	return view('main.admin.bank.bank_create');
    }
    public function list_bank()
    {
        if(Auth::User()->brand_id==1){ 
            $datas = Bank::orderBy('created_at','desc')->get();
          }else{
            $datas = Bank::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
    	
    	return view('main.admin.bank.bank_list',compact('datas'));
    }

    public function store_bank(Request $request){
    	
        $request->validate([
            // 'sort' => 'unique:banks|required',
            'name' => 'unique:banks|required'
        ]);
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Bank();
      
        $input = $request->all();
        
        $input['uid']= $uid;
        $input['brid'] = $brid;
        $data->fill($input)->save();
    	$datas = Bank::orderBy('created_at','desc')->get();
    	return redirect(route('create-bank-list'))->with('success', 'Data Added Successfully...!!!');
    }
    public function bank_edit($id)
    {
    	$data = Bank::findOrFail($id);
    	return view('main.admin.bank.bank_edit',compact('data'));
    }

    public function update_bank(Request $request,$id)
    {
    	$request->validate([
            // 'sort' => 'required',
            'name' => 'required'
        ]);

        $data = Bank::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    }

    public function bank_destroy($id)
    {
        $data = Bank::where('id',$id);
        $data->delete();
        return Redirect::back()->with('success', 'Data Deleted Successfully...!!!');
    } 
}
