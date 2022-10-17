<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use Carbon\Carbon;
use App\Employee;
use App\Department;
use App\Designation;
use App\Branch;
use App\LeaveType;
use App\LeaveApplication;
use DB;
use Auth;

class payrollreportController extends Controller
{
    public function employee_list()
    {
        if(Auth::User()->brand_id==1){
            $data = Employee::with(['department','designation','branch'])->get();
          }else{
            $data = Employee::where('wbrid',Auth::User()->brand_id)->with(['department','designation','branch'])->get();
          }
        return view('main.admin.report.rep_empemployeelist',compact('data'));
    }

    public function attendance()
    {
        return view('main.admin.report.rep_empattemdance');
    }
    public function commissionreport()
    {
        return view('main.admin.report.rep_empcommissionreport');
    }

    public function leaverecord()
    {
        if(Auth::User()->brand_id==1){
            $data = LeaveType::orderBy('created_at','desc')->get();
          }else{
            $data = LeaveType::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
        
        return view('main.admin.report.rep_empleaverecord',compact('data'));
    }

    public function salaryreport()
    {
        return view('main.admin.report.rep_empsalaryreport');
    }
    public function overview()
    {
        return view('main.admin.report.rep_emppayrolloverview');
    }

    
}
