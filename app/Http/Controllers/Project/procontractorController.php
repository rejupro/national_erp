<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Procontractor;
use Redirect;
Use Auth;
use DB;

class procontractorController extends Controller
{
    public function create_project_contractor()
    {
        $results = 'CONT-NO-00' . Procontractor::get()->max('id');
    	return view('main.admin.manage_project.project_contractor_create',compact('results'));
    }
    public function list_project_contractor()
    {
        if(Auth::User()->brand_id==1){
    	  $datas = Procontractor::orderBy('created_at','desc')->get();
        //   dd($datas->toArray());
        }else{
            $datas = Procontractor::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
    	return view('main.admin.manage_project.project_contractor_list',compact('datas'));
    }

    public function store_project_contractor(Request $request){
    	
        $request->validate([
            'code' => 'unique:procontractors|required',
            'name' => 'required'
        ]);

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Procontractor();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $insert = $data->fill($input)->save();
    	// $datas = Procontractor::orderBy('created_at','desc')->get();
    	// return view('main.admin.manage_project.project_contractor_list ',compact('datas'));
        if($insert){
            return redirect(route('project-contractor-list-page'))->with('success', 'Data Inserted Successfully');
        }
    }
    public function project_contractor_edit($id)
    {
    	$data = Procontractor::findOrFail($id);
    	return view('main.admin.manage_project.project_contractor_edit',compact('data'));
    }

    public function update_project_contractor(Request $request,$id)
    {
    	$request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        $data = Procontractor::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::route('project-contractor-list-page')->with('success', 'Data Updated Successfully');
    }

    public function project_contractor_destroy($id)
    {
        $ids='CO_'.$id;

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
       
        $check=DB::table('projects')->where('coid',$id)->get();
        $checkcount = $check->count();
        
        if(($checkcount >0) || ($paymentCount >0) || ($receiveCount >0)){

            return Redirect::back()->with('warning', 'Project Contractor Depends on Other table...!!!');  
        }else{
            $delete = Procontractor::findOrFail($id);
            $delete->delete();
            return redirect(route('project-contractor-list-page'))->with('success', 'Data Updated Successfully');
        }
    } 
}
