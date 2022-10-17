<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\District;
use App\Group;
use App\Zone;
use Auth;

class receiveablesreportController extends Controller
{
    public function customerlist(){
        if(Auth::User()->brand_id==1){
            $customers = Customer::with(['group','district','zone'])->get();
          }else{
            $customers = Customer::where('brid',Auth::User()->brand_id)->with(['group','district','zone'])->get();                    
          }
       
        return view('main.admin.report.rep_revcustomerlist',compact('customers'));
    }

    public function customerbalance(){
        return view('main.admin.report.rep_revcustomerbalance');
    }
    public function customerstatement(){
        return view('main.admin.report.rep_revcustomerstate');
    }
    public function customeritemstate(){
        return view('main.admin.report.rep_revcustomeritemstate');
    }
    public function customerduecol(){
        return view('main.admin.report.rep_revcustomerduecol');
    }
    public function customeroverview(){
        return view('main.admin.report.rep_revcustomeroverview');
    }
    public function overview(){
        return view('main.admin.report.rep_revoverview');
    }
}
