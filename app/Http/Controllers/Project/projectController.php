<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Project;
use App\Progroup;
use App\Prosubgroup;
use App\Protype;
use App\Procontractor;
use App\Customer;
use Redirect;
use Auth;
use DB;

class projectController extends Controller
{
    public function create_project()
    {
        if(Auth::User()->brand_id==1){
          $subgroup = Prosubgroup::orderBy('created_at','desc')->get();
        }else{
          $subgroup = Prosubgroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $group = Progroup::orderBy('created_at','desc')->get();
        }else{
           $group = Progroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $type = Protype::orderBy('created_at','desc')->get();
        }else{
          $type = Protype::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $contractor = Procontractor::orderBy('created_at','desc')->get();
        }else{
            $contractor = Procontractor::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $customer=Customer::get();
        }else{
          $customer=Customer::where('brid',Auth::User()->brand_id)->get(); 
        }
        $results = 'PRJ-NO-' . Project::get()->max('id');
        return view('main.admin.manage_project.project_create',compact('results','group','subgroup','type','contractor','customer'));
    }
    public function list_project()
    {
        if(Auth::User()->brand_id==1){
          $project = Project::with(['group','subgroup','type','contractor','customer'])
          ->orderBy('created_at','desc')->get();
        }else{
          $project = Project::with(['group','subgroup','type','contractor','customer'])
          ->where('brid',Auth::User()->brand_id)
          ->orderBy('created_at','desc')->get();
                    
        }
        return view('main.admin.manage_project.project_list',compact('project'));
    	
    }

    public function store_project(Request $request){
    	
        $request->validate([
            'name' => 'required',
            'project_id' => 'unique:projects'
        ]);

        //dd($request->all());
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Project();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
    	return Redirect::route('project-list-page')->with('success', 'Data Create Successfully...!!!');
    }
    public function project_edit($id)
    {
        if(Auth::User()->brand_id==1){
          $group = Progroup::orderBy('created_at','desc')->get();
        }else{
          $group = Progroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $subgroup = Prosubgroup::orderBy('created_at','desc')->get();
        }else{
          $subgroup = Prosubgroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $datas= DB::table('prosubgroups')
          ->join('progroups','progroups.id','=','prosubgroups.pgid')
          ->select('progroups.name as pg_name','prosubgroups.*')
          ->get();
        }else{
          $datas= DB::table('prosubgroups')
          ->join('progroups','progroups.id','=','prosubgroups.pgid')
          ->select('progroups.name as pg_name','prosubgroups.*')
          ->where('prosubgroups.brid',Auth::User()->brand_id)
          ->get();
        }
        if(Auth::User()->brand_id==1){
          $type = Protype::orderBy('created_at','desc')->get();
        }else{
          $type = Protype::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
            $contractor = Procontractor::orderBy('created_at','desc')->get();
          }else{
              $contractor = Procontractor::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $customer=Customer::get();
        }else{
          $customer=Customer::where('brid',Auth::User()->brand_id)->get(); 
        }
    	$project = Project::findOrFail($id);
    	return view('main.admin.manage_project.project_edit',compact('project','group','subgroup','type','contractor','customer'));
    }

    public function update_project(Request $request,$id)
    {
    	$request->validate([
            'project_id' => 'required'
        ]);

        $data = Project::findOrFail($id);
        $input['project_id'] =$request->project_id;
        $input['name'] = $request->name;
        $input['pgid'] = $request->pgid;
        $input['psgid'] = $request->psgid;
        $input['status'] = $request->status;
        $input['cperson'] = $request->cperson;
        $input['cnumber'] = $request->cnumber;
        $input['prjamount'] = $request->prjamount;
        $input['prjexamount'] = $request->prjexamount;
        $input['coid'] = $request->coid;
        $input['coamount'] = $request->coamount;
        $input['client'] = $request->client;
        $input['prjdetails'] = $request->prjdetails;
        $input['address'] = $request->address;
        $input['save_project'] = $request->save_project;
        // dd($input);
        $data->update($input);

        return Redirect::route('project-list-page')->with('success', 'Data Updated Successfully...!!!');
    }

    public function project_destroy($id)
    {

      $paymentdetails = DB::table('payment_vauchers')
      ->where('project_id',$id)
      ->get();
      $paymentCount = $paymentdetails->count();
      $receivedetails = DB::table('receive_vouchers')
      ->where('project_id',$id)
      ->get();
      $receiveCount = $receivedetails->count();
      $expensedetails = DB::table('expense_vouchers')
      ->where('project_id',$id)
      ->get();
      $expenseCount = $expensedetails->count();
      $dexpensedetails = DB::table('daily_expense_models')
      ->where('project_id',$id)
      ->get();
      $dexpenseCount = $dexpensedetails->count();
      
      if(($dexpenseCount >0) || ($expenseCount >0) || ($paymentCount >0) || ($receiveCount >0)){

          return Redirect::back()->with('warning', 'Project Depends on Other table...!!!');  
      }else{
        //dd("$dexpenseCount");
          $delete = Project::findOrFail($id);
          $delete->delete();
          return redirect(route('project-list-page'))->with('success', 'Project Delete Successfully...!!!');
      }
       
    } 
    public function show($id)
    {
      $projects=Project::with('customer')->findOrFail($id);
      // dd($projects->toArray());
        return view('main.admin.manage_project.project_view',compact('projects'));
    }

    public function project_details($id)
    {
        $data = DB::table('projects')->where('id',$id)->first();
        $paymenttotal = DB::table('payment_vauchers')->where('project_id',$id)->get()->sum("amount");
       
       // dd($paymenttotal);
        $paymentdetails = DB::table('payment_vauchers')->where('project_id',$id)->get();
        $paymentCount = $paymentdetails->count();

        $receivetotal = DB::table('receive_vouchers')->where('project_id',$id)->get()->sum("amount");
        $receivedetails = DB::table('receive_vouchers')->where('project_id',$id)->get();
        $receiveCount = $receivedetails->count();

        $expensetotal = DB::table('expense_vouchers')->where('project_id',$id)->get()->sum("amount");
        $expensedetails = DB::table('expense_vouchers')->where('project_id',$id)->get();
        $expenseCount = $expensedetails->count();
        $dtotal=$paymenttotal+$expensetotal;
        $balance=$receivetotal-($paymenttotal+$expensetotal);
      
       

        return view('main.admin.manage_project.project_details',compact('data','paymentCount','paymenttotal','paymentdetails',
        'receivetotal','receivedetails','receiveCount','expensetotal','expensedetails','expenseCount','dtotal','balance'
         ));
    }
}
