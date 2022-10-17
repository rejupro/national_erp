<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Progroup;
use Redirect;
use Auth;
use DB;
use App\Project;

class progroupController extends Controller
{
    public function create_progroup()
    {
        $results = 'PRG-NO-00' . Progroup::get()->max('id');
    	return view('main.admin.manage_project.project_group_create',compact('results'));
    }
    public function list_progroup()
    {
        if(Auth::User()->brand_id==1){
            $datas = Progroup::orderBy('created_at','desc')->get();
          }else{
              $datas = Progroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
    	return view('main.admin.manage_project.project_group_list',compact('datas'));
    }

    public function store_progroup(Request $request)
    {	
        $request->validate([
            'code' => 'unique:progroups|required',
            'name' => 'required'
        ]);
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Progroup();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
    	$datas = Progroup::orderBy('created_at','desc')->get();
    	return Redirect()->route('progroup-list-create')->with('success', 'Data Create Successfully...!!!');
    }
    public function progroup_edit($id)
    {
    	$data = Progroup::findOrFail($id);
    	return view('main.admin.manage_project.project_group_edit',compact('data'));
    }

    public function update_progroup(Request $request,$id)
    {
    	$request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $data = Progroup::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::route('progroup-list-create')->with('success', 'Data Updated Successfully...!!!');
    }

    public function progroups_destroy($id)
    {
        $check=DB::table('projects')->where('pgid',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->withErrors(['Project Group Depends on Other table...!!!']);  
        }else{
            $delete = Progroup::findOrFail($id);
            $delete->delete();
            return redirect(route('progroup-list-create'))->with('success', 'Data Deleted Successfully...!!!');
        }
    } 
}
