<?php

namespace App\Http\Controllers\DailySales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Redirect;
use App\DailySaleReport;
use DB;
use Validator;
use Carbon\Carbon;
use Auth;

class DailySalesController extends Controller
{
    public function sales_report_index()
    {
        if(Auth::User()->brand_id==1 || Auth::User()->status == 007){
            $report = DB::table('daily_sale_reports')
                ->join('employees','employees.id','=','daily_sale_reports.employee_id')
                ->orderBy('created_at','desc')
                ->select('daily_sale_reports.*','employees.name as employee_name')
                ->get();
        }else{
            $report = DB::table('daily_sale_reports')
                ->join('employees','employees.id','=','daily_sale_reports.employee_id')
                ->where('daily_sale_reports.branch_id',Auth::User()->brand_id)
                ->orderBy('created_at','desc')
                ->select('daily_sale_reports.*','employees.name as employee_name')
                ->get();
        }
        return view('main.admin.daily_sale_records.daily_sale_records_list',compact('report'));
    }

    public function sales_report_add()
    {
        if(Auth::User()->brand_id==1 || Auth::User()->status == 007){
            $employee = Employee::orderBy('created_at','desc')->get();
        }else{
            $employee = Employee::orderBy('created_at','desc')->where('brid',Auth::User()->brand_id)->get();
        }
        $report = "";
        return view('main.admin.daily_sale_records.add_daily_sales_record',compact('employee','report'));
    }

    public function sales_report_store(Request $request)
    {
        $input['company_name'] = $request->company_name;
        $input['contract_name'] = $request->contract_name;
        $input['contract_email'] = $request->contract_email;
        $input['contract_designation'] = $request->contract_designation;
        $input['contract_mobile'] = $request->contract_mobile;
        $input['interested_product'] = $request->interested_product;
        $input['contract_address'] = $request->contract_address;
        $input['comments'] = $request->comments;
        $input['employee_id'] = $request->employee_id;
        $input['branch_id'] = $request->branch_id;
        $input['contract_date'] = $request->contract_date;
        $input['created_by'] = Auth::User()->name;
        if(!empty($request->id)){
            $update = DailySaleReport::where('id',$request->id)->update($input);
            if($update){
                return Redirect::back()->withErrors(['Daily Sales Report Updated Successfully...!!!']);  
            }else{
                return Redirect::back()->withErrors(['Daily Sales Report Cannot Be Updated Successfully...!!!']);  
            }
        }else{
            $insert = DailySaleReport::insert($input);
            if($insert){
                return Redirect::back()->withErrors(['Daily Sales Report Added Successfully...!!!']);  
            }else{
                return Redirect::back()->withErrors(['Daily Sales Report Cannot Be Added Successfully...!!!']);  
            }
        }
    }

    public function sales_report_view($id)
    {
        $report = DB::table('daily_sale_reports')
                ->join('employees','employees.id','=','daily_sale_reports.employee_id')
                ->where('daily_sale_reports.id',$id)
                ->orderBy('created_at','desc')
                ->select('daily_sale_reports.*','employees.name as employee_name')
                ->first();
        return view('main.admin.daily_sale_records.load_daily_sales_repor',compact('report'));
    }

    public function sales_report_edit($id)
    {
        $report = DB::table('daily_sale_reports')
                ->join('employees','employees.id','=','daily_sale_reports.employee_id')
                ->where('daily_sale_reports.id',$id)
                ->orderBy('created_at','desc')
                ->select('daily_sale_reports.*','employees.name as employee_name')
                ->first();
        if(Auth::User()->brand_id==1 || Auth::User()->status == 007){
            $employee = Employee::orderBy('created_at','desc')->get();
        }else{
            $employee = Employee::orderBy('created_at','desc')->where('brid',Auth::User()->brand_id)->get();
        }
        return view('main.admin.daily_sale_records.add_daily_sales_record',compact('report','employee'));
    }
}
