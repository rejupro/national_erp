<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Progroup;
use App\Prosubgroup;
use App\Protype;
use App\Procontractor;
use App\Customer;
use Auth;

class projectreportController extends Controller
{
    public function project_status(){

        if(Auth::User()->brand_id==1){
            $project = Project::with(['group','subgroup','type','contractor','customer'])
            ->orderBy('created_at','desc')->get();
          }else{
            $project = Project::with(['group','subgroup','type','contractor','customer'])
            ->where('brid',Auth::User()->brand_id)
            ->orderBy('created_at','desc')->get();
                      
          }
        
        return view('main.admin.report.rep_prjprojectlist',compact('project'));
    }
    public function project_details(){

        if(Auth::User()->brand_id==1){
            $project = Project::with(['group','subgroup','type','contractor','customer'])
            ->orderBy('created_at','desc')->get();
          }else{
            $project = Project::with(['group','subgroup','type','contractor','customer'])
            ->where('brid',Auth::User()->brand_id)
            ->orderBy('created_at','desc')->get();
                      
          }
        return view('main.admin.report.rep_prjprojectdetails',compact('project'));
    }
    public function project_contructorlist(){
        if(Auth::User()->brand_id==1){
            $datas = Procontractor::orderBy('created_at','desc')->get();
          }else{
              $datas = Procontractor::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
    	return view('main.admin.report.rep_prjcontructorlist',compact('datas'));
    }

    public function project_contructorbalance(){
        return view('main.admin.report.rep_prjcontructorbalance');
    }
    public function project_contructorstate(){
        return view('main.admin.report.rep_prjcontructorstate');
    }
    public function project_overview(){
        return view('main.admin.report.rep_prjoverview');
    }
}
