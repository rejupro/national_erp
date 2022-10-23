<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Datatables;
use DB;
use App\Prosubgroup;
use App\Progroup;
use Redirect;
use Auth;


class prosubgroupController extends Controller
{
    public function create_prosubgroup()
    {
        $results = 'PRSG-NO-00' . Prosubgroup::get()->max('id');
        if(Auth::User()->brand_id==1){
            $group = Progroup::orderBy('created_at','desc')->get();
          }else{
            $group = Progroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
        

    	return view('main.admin.manage_project.project_subgroup_create',compact('group','results'));
    }
    public function list_prosubgroup()
    {
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
        
        // dd($datas);
    	return view('main.admin.manage_project.project_subgroup_list',compact('datas'));
    }

    public function store_prosubgroup(Request $request)
    {	
        $request->validate([
            'pgid' => 'required',
            'name' => 'required'
        ]);

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Prosubgroup();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
    	$datas = Prosubgroup::orderBy('created_at','desc')->get();
    	return Redirect()->route('prosubgroup-list-create')->with('success', 'Data Create Successfully...!!!');
    }
    public function prosubgroup_edit($id)
    {   
        $subgroup = Prosubgroup::find($id);
        $group = Progroup::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_subgroup_edit',compact('group','subgroup'));
    }

    public function update_prosubgroup(Request $request,$id)
    {
        // dd('hi');
    	$request->validate([
            'pgid' => 'required',
            'name' => 'required'
        ]);

        $data = Prosubgroup::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
    }

    public function prosubgroups_destroy($id)
    {
        $check=DB::table('projects')->where('psgid',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Project Sub-Group Depends on Other table...!!!');  
        }else{
            $delete = Prosubgroup::findOrFail($id);
            $delete->delete();
            return redirect(route('prosubgroup-list-create'))->with('success', 'Data Deleted Successfully...!!!');
        }
    } 
}
