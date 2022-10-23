<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Employee;
use App\Department;
use App\Designation;
use App\Branch;
use DB;
use Auth;

class EmployeeController extends Controller
{
    public function employee_index()
    {

        if(Auth::User()->brand_id==1){
            $data = Employee::with(['department','designation','branch'])->get();
          }else{
            $data = Employee::where('wbrid',Auth::User()->brand_id)->with(['department','designation','branch'])->get();
          }
       
        return view('main.admin.payroll.employee_list',compact('data'));
    }

    public function create_page()
    {
        $department=Department::orderBy('dept_name','asc')->get();
        $designation=Designation::orderBy('desg_name','asc')->get();
        $branch=Branch::orderBy('name','asc')->get();
        return view('main.admin.payroll.employee_create',compact('designation','department','branch'));
    }

    public function employee_store(Request $request)
    {

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $request->validate([
            'name'   => 'required|string',
            'join_date'   => 'required|string',
            'salary'   => 'required|string|numeric',
            'status'   => 'required|string',
            'wbrid'   => 'required',
            'item'   => 'mimes:jpeg,jpg,png,svg,jpeg,JPEG,PNG,JPG'
        ]);
        $data = new Employee();
        $input = $request->all();
        $input['uid']= $uid;
        $input['brid']= $brid;
        $image=$request->file('item');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='Upload/Employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $input['item']=$image_url;
            $input['created_by']='';
            $data->fill($input)->save();
        return Redirect::back()->with('success', 'Data Added Successfully...!!!');
        }
        else{
            $input['created_by']='';
            $data->fill($input)->save();   
            return Redirect::back()->with('success', 'Data Added Successfully...!!!');
        }
    }

    public function edit_page($id)
    {
        $data = DB::table('employees')
        ->join('departments','departments.id','=','employees.dept_id')
        ->join('designations','designations.id','=','employees.desg_id')
        ->join('branches','branches.id','=','employees.wbrid')
        ->where('employees.id',$id)
        ->select('employees.*','departments.dept_name','designations.desg_name','branches.name as br_name')
        ->first();
        $department=Department::orderBy('dept_name','asc')->get();
        $designation=Designation::orderBy('desg_name','asc')->get();
        $branch=Branch::orderBy('name','asc')->get();
        return view('main.admin.payroll.employee_edit',compact('data','designation','department','branch'));
    }

    public function update_store(Request $request,$id)
    {
        $data = Employee::findOrFail($id);
        $input = $request->all();
        $image=$request->file('item');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='Upload/Employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $input['item']=$image_url;
            $input['created_by']='';
        $data->update($input);
        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
        }
        else{
        $data = Employee::findOrFail($id);
        $input = $request->all();
        $input['item']=$data->item;
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
        }
    }

    public function Employee_destroy($id)
    {
        $ids='EP_'.$id;

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
        $expensedetails = DB::table('expense_vouchers')
        ->where('stf_id',$id)
        ->get();
        $expenseCount = $expensedetails->count();
        $dexpensedetails = DB::table('daily_expense_models')
        ->where('stf_id',$id)
        ->get();
        $dexpenseCount = $dexpensedetails->count();
       
        
        if(($dexpenseCount >0) || ($expenseCount >0) || ($paymentCount >0) || ($receiveCount >0)){

            return Redirect::back()->with('warning', 'Employee Depends on Other table...!!!');  
        }else{
           //dd($salesCount);
            $delete = Employee::findOrFail($id);
            $delete->delete();
            return redirect(route('employee-list-page'))->with('success', 'Employee Delete Successfully...!!!');
        }
    }



    public function Employee_details($id)
    {
        $stf_id='EP_'.$id;
        //dd($stf_id);
        $paymenttotal = DB::table('payment_details')->where('payment_to',$stf_id)->get()->sum("amount");
       
       // dd($paymenttotal);
        $paymentdetails = DB::table('payment_details')->where('payment_to',$stf_id)->get();
        $paymentCount = $paymentdetails->count();
        $dailyexptotal = DB::table('daily_expense_models')->where('stf_id',$stf_id)->get()->sum("grand_total");
        $dailyexp = DB::table('daily_expense_models')->where('stf_id',$stf_id)->get();
        $dailyexpCount = $dailyexp->count();

        $dailyexpdetails = DB::table('daily_expense_model_details')->where('stf_id',$stf_id)->get();
        $data = Employee::findOrFail($id);

        return view('main.admin.payroll.employee_details',compact('data','paymentCount','dailyexpCount','paymenttotal','paymentdetails','dailyexptotal','dailyexpdetails','dailyexp'));
    }



}
