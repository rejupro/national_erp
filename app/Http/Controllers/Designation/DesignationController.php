<?php

namespace App\Http\Controllers\Designation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Designation;
use DB;
use Auth;

class DesignationController extends Controller
{
    public function designation_index()
    {
        if(Auth::User()->brand_id==1){
            $data = Designation::orderBy('created_at','desc')->get();
           }else{
            $data = Designation::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
           }
       
        return view('main.admin.payroll.designation_list',compact('data'));
    }

    public function create_page()
    {
        return view('main.admin.payroll.designation_create');
    }

    public function dept_store(Request $request)
    {
        $request->validate([
            'desg_name' => 'unique:designations|required',
        ]);
        $brid=Auth::User()->brand_id;

        $data = new Designation();
        $input = $request->all();
        $input['created_by']='';
        $input['brid']= $brid;
        $data->fill($input)->save();
        return Redirect::back()->with('success', 'Data Added Successfully...!!!');
    }

    public function edit_page($id)
    {
        $data = Designation::where('id',$id)->first();
        return view('main.admin.payroll.designation_edit',compact('data'));
    }

    public function update_store(Request $request,$id)
    {
        $request->validate([
            'desg_name' => 'unique:designations|required'
        ]);

        $data = Designation::findOrFail($id);
        $input = $request->all();
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    }

    public function designation_destroy($id)
    {
        $check=DB::table('employees')->where('desg_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with( 'warning', 'Designation Depends on Other table...!!!');  
        }else{
            $delete = Designation::findOrFail($id);
            $delete->delete();
            return Redirect::back()->with('success', 'Designation Delete Successfully...!!!');
        }
    }
}
