<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use Carbon\Carbon;
use App\Company;
use Validator;
use Redirect;
use Auth;

class companyController extends Controller
{
   
    public function index()
    {
    	$data=Company::first();
        $head=Company::orderBy('created_at')->first();
    	$count=Company::count();
    	if ($count>0) {
    		return view('main.admin.company.company_setting',compact('data','head'));
    	}
    	else{
    		return view('main.admin.company.company_setting_create');
    	}
    	
    }

    public function store(Request $request)
    {
        
    	$request->validate([
    			'name'=> 'required',
                'image' => 'required|mimes:jpeg,jpg,png,svg,jpeg,JPEG,PNG,JPG'
		]);

        //--- Validation Section Ends

        //--- Logic Section
        $data = new Company();
        $input = $request->all();
        $image=$request->file('image');
        if ($image) {
            $image_name1=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name1=$image_name1.'.'.$ext;
            $upload_path1='upload/Admin/Company/';
            $image_url1=$upload_path1.$image_full_name1;
            $success1=$image->move($upload_path1,$image_full_name1);
            $input['image']=$image_url1;
            $input['created_by']=Auth::User()->name;
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        
        return Redirect::back()->withErrors([ 'Data Added Successfully...!!!']);
    	}
    	else{
    		echo "<pre>";
    		print_r("sorry");
    		exit();
    	}
    }

    public function edit($id)
    {
    	$data=Company::get();
    	return view('main.admin.company.company_setting',compact('data'));
    }

    public function update(Request $request,$id)
    {
    	
    	$request->validate([
            'name'=> 'required'
            
		]);

        //--- Validation Section Ends

        //--- Logic Section
        
        $data = Company::findOrFail($id);
        $input = $request->all();
        if ($request->file('image')) {
	        $image=$request->file('image');

            $image_name1=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name1=$image_name1.'.'.$ext;
            $upload_path1='upload/Admin/Company/';
            $image_url1=$upload_path1.$image_full_name1;
            $success1=$image->move($upload_path1,$image_full_name1);
            $input['image']=$image_url1;
            $input['created_by']=Auth::User()->name;

            $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section        
        
        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    	}
    	else{
            $data->update($input);
        	return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    	}
    }
}
