<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\District;
use App\Group;
use App\Zone;
use Auth;

class payablesreportController extends Controller
{
    public function supllierlist(){
       
        if(Auth::User()->brand_id==1){
            $suppliers = Supplier::get();
         }else{
            $suppliers = Supplier::where('brid',Auth::User()->brand_id)->get();
         }
        return view('main.admin.report.rep_paysupllierlist',compact('suppliers'));
    }

    public function supllierbalance(){
        return view('main.admin.report.rep_paysupllierbalance');
    }
    public function supllierstatement(){
        return view('main.admin.report.rep_paysupllierstate');
    }
    public function supllieritemstate(){
        return view('main.admin.report.rep_paysupllieritemstate');
    }
    public function supllieroverview(){
        return view('main.admin.report.rep_paysupllieroverview');
    }
    public function overview(){
        return view('main.admin.report.rep_payoverview');
    }
}
