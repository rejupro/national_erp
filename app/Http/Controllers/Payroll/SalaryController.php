<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Employee;
use App\Branch;
use App\Salary;
use App\Payslip;
use Auth;
use DB;

class SalaryController extends Controller
{
    public function salary_create()
    {
        $branch = Branch::orderBy('created_at','desc')->get();
        if(Auth::User()->brand_id==1){
            $employee = Employee::orderBy('created_at','desc')->get();
        }else{
            $employee = Employee::where('wbrid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        $salary="";
        return view('main.admin.payroll.salary_create',compact('branch','employee','salary'));
    }


    public function salary_store(Request $request)
    {
        if($request->id){  
            $input['emp_id'] = $request->emp_id;
            $input['branch_id1'] = $request->branch_id1;
            $branch1 = Branch::where('id',$request->branch_id1)->first();
            $input['branch_name1'] = $branch1->name;
            $input['salary1'] = $request->salary1;
            $input['branch_id2'] = $request->branch_id2;
            if($request->branch_id2){
                $branch2 = Branch::where('id',$request->branch_id2)->first();
                $input['branch_name2'] = $branch2->name;
            }
            $input['salary2'] = $request->salary2;
            $input['branch_id3'] = $request->branch_id3;
            if($request->branch_id3){
                $branch3 = Branch::where('id',$request->branch_id3)->first();
                $input['branch_name3'] = $branch3->name;
            }
            $input['salary3'] = $request->salary3;
            $input['total_salary'] = $request->salary1 + $request->salary2 + $request->salary3;
            $input['created_by'] = Auth::User()->name;
            $salary = Salary::where('id',$request->id)->update($input);

        return Redirect::route('salary-list-page')->with('success', 'Salary Updated Successfully...!!!');
        }else{
            $input['emp_id'] = $request->emp_id;
            $input['branch_id1'] = $request->branch_id1;
            $branch1 = Branch::where('id',$request->branch_id1)->first();
            $input['branch_name1'] = $branch1->name;
            $input['salary1'] = $request->salary1;
            $input['branch_id2'] = $request->branch_id2;
            if($request->branch_id2){
                $branch2 = Branch::where('id',$request->branch_id2)->first();
                $input['branch_name2'] = $branch2->name;
            }
            $input['salary2'] = $request->salary2;
            $input['branch_id3'] = $request->branch_id3;
            if($request->branch_id3){
                $branch3 = Branch::where('id',$request->branch_id3)->first();
                $input['branch_name3'] = $branch3->name;
            }
            $input['salary3'] = $request->salary3;
            $input['total_salary'] = $request->salary1 + $request->salary2 + $request->salary3;
            $input['created_by'] = Auth::User()->name;
            $salary = Salary::insert($input);

        return Redirect::route('salary-list-page')->with('success', 'Salary Added Successfully...!!!');
        }
    }



    public function salary_index()
    {
        if(Auth::User()->brand_id==1){
            $salary = DB::table('salaries')
            ->join('employees','employees.id','=','salaries.emp_id')
            ->join('designations','designations.id','=','employees.desg_id')
            ->orderBy('created_at','desc')
            ->select('salaries.*','employees.name as emp_name','designations.desg_name')
            ->get();
        }else{
            $salary = DB::table('salaries')
            ->join('employees','employees.id','=','salaries.emp_id')
            ->join('designations','designations.id','=','employees.desg_id')
            ->where('salaries.branch_id1',Auth::User()->brand_id)
            ->orWhere('salaries.branch_id3',Auth::User()->brand_id)
            ->orWhere('salaries.branch_id2',Auth::User()->brand_id)
            ->orderBy('created_at','desc')
            ->select('salaries.*','employees.name as emp_name','designations.desg_name')
            ->get();
        }
        // dd($salary);
        return view('main.admin.payroll.salary_list',compact('salary'));
    }

    public function salary_edit($id)
    {
        $branch = Branch::orderBy('created_at','desc')->get();
        if(Auth::User()->brand_id==1){
            $employee = Employee::orderBy('created_at','desc')->get();
        }else{
            $employee = Employee::where('wbrid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        $salary = DB::table('salaries')
        ->join('employees','employees.id','=','salaries.emp_id')
        ->where('salaries.id',$id)
        ->select('salaries.*','employees.name as emp_name')
        ->first();
        return view('main.admin.payroll.salary_create',compact('branch','employee','salary'));
    }

    public function salary_destroy($id)
    {
        $data=Salary::findOrfail($id);
        $data->delete();
        return Redirect::back()->with('success', 'Data Deleted Successfully...!!!');
    }

    public function payslip_index()
    {
        if(Auth::User()->brand_id==1){
            $salary = DB::table('payslips')
            ->join('employees','employees.id','=','payslips.emp_id')
            ->join('designations','designations.id','=','employees.desg_id')
            ->orderBy('created_at','desc')
            ->select('payslips.*','employees.name as emp_name','designations.desg_name')
            ->get();
        }else{
            $salary = DB::table('payslips')
            ->join('employees','employees.id','=','payslips.emp_id')
            ->join('designations','designations.id','=','employees.desg_id')
            ->where('payslips.branch_id1',Auth::User()->brand_id)
            ->orderBy('created_at','desc')
            ->select('payslips.*','employees.name as emp_name','designations.desg_name')
            ->get();
        }
        // dd($salary);
        return view('main.admin.payroll.payslip_list',compact('salary'));
    }

    public function payslip_create()
    {
        $branch = Branch::orderBy('created_at','desc')->get();
        if(Auth::User()->brand_id==1){
            $employee = Employee::orderBy('created_at','desc')->get();
        }else{
            $employee = Employee::where('wbrid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        $salary="";
        return view('main.admin.payroll.payslip_create',compact('branch','employee','salary'));
    }

    public function payslip_store (Request $request)
    {
        $request->validate([
            'emp_id' => 'required',
            'month' => 'required',
            'branch_id' => 'required',
            'salary' => 'required',
        ]);
        $input['emp_id'] = $request->emp_id;
        $input['month'] = $request->month;
        $input['branch_id'] = $request->branch_id;
        $input['salary'] = $request->salary;
        $input['present_day'] = $request->present_day;
        $input['absent_day'] = $request->absent_day;
        $input['due_salary'] = $request->due_salary;
        $input['fine'] = $request->fine;
        $input['loan'] = $request->loan;
        $input['salary_advance'] = $request->salary_advance;
        $input['commission'] = $request->commission;
        $input['net_payable'] = $request->net_payable;
        $input['remark'] = $request->remark;
        $input['created_by'] = Auth::User()->name;
        if($request->id){
            $update = Payslip::where('id',$request->id)->update($input);
            if($update){
                return Redirect::route('payslip-list-page')->with('success', 'Payslip Updated Successfully...!!!');
            }else{
                return Redirect::route('payslip-list-page')->with('warning', 'Payslip Cannot Be Updated Successfully...!!!');
            }
        }else{
            $insert = Payslip::insert($input);
            if($insert){
                return Redirect::route('payslip-list-page')->with('success', 'Payslip Updated Successfully...!!!');
            }else{
                return Redirect::route('payslip-list-page')->with('warning', 'Payslip Cannot Be Updated Successfully...!!!');
            }
        }
    }

    public function payslip_edit($id)
    {
        $branch = Branch::orderBy('created_at','desc')->get();
        if(Auth::User()->brand_id==1){
            $employee = Employee::orderBy('created_at','desc')->get();
        }else{
            $employee = Employee::where('wbrid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        $salary = DB::table('payslips')
        ->join('employees','employees.id','=','payslips.emp_id')
        ->where('payslips.id',$id)
        ->select('payslips.*','employees.name as emp_name')
        ->first();
        return view('main.admin.payroll.payslip_create',compact('branch','employee','salary'));
    }

    public function payslip_destroy($id)
    {
        $data=Payslip::findOrfail($id);
        $data->delete();
        return Redirect::back()->with('success', 'Payslip Deleted Successfully...!!!');
    }


    
    // Get Sallery Ajax
    public function payslip_salaryajax($id){
        $user = Employee::findOrFail($id)->salary;
        return response()->json(['data'=> $user]);
    }
}
