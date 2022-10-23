<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Department;
use DB;
use Auth;

class DepartmentController extends Controller
{
    public function department_index()
    {
        if(Auth::User()->brand_id==1){
            $data = Department::orderBy('created_at','desc')->get();
           }else{
            $data = Department::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
           }
       
        return view('main.admin.payroll.department_list',compact('data'));
    }

    public function create_page()
    {
        return view('main.admin.payroll.department_create');
    }

    public function dept_store(Request $request)
    {
        $request->validate([
            'dept_name' => 'unique:departments|required'
        ]);
        $brid=Auth::User()->brand_id;

        $data = new Department();
        $input = $request->all();
        $input['created_by']='';
        $input['brid']= $brid;
        $data->fill($input)->save();
        return Redirect::back()->with('success', 'Data Added Successfully...!!!');
    }

    public function edit_page($id)
    {
        $data = Department::where('id',$id)->first();
        return view('main.admin.payroll.department_edit',compact('data'));
    }

    public function update_store(Request $request,$id)
    {
        $request->validate([
            'dept_name' => 'unique:departments|required'
        ]);

        $data = Department::findOrFail($id);
        $input = $request->all();
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->with('success', 'Department Updated Successfully...!!!');
    }

    public function department_destroy($id)
    {
        $check=DB::table('employees')->where('dept_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Department Depends on Other table...!!!');  
        }else{
            $delete = Department::findOrFail($id);
            $delete->delete();
            return Redirect::back()->with('success', 'Department Delete Successfully...!!!');
        }
    }
}
