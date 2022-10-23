<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Protype;
use Redirect;
Use Auth;
use DB;


class protypeController extends Controller
{
    public function create_project_type()
    {
    	return view('main.admin.manage_project.project_type_create');
    }
    public function list_project_type()
    {
        if(Auth::User()->brand_id==1){
            $datas = Protype::orderBy('created_at','desc')->get();
          }else{
            $datas = Protype::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
    	
    	return view('main.admin.manage_project.project_type_list',compact('datas'));
    }

    public function store_project_type(Request $request){
    	
        $request->validate([
            'name' => 'required'
        ]);

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Protype();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
    	$datas = Protype::orderBy('created_at','desc')->get();
        return redirect(route('project-type-list-page'))->with('success','Data Create Successfully...!!!');
    }
    public function project_type_edit($id)
    {
    	$data = Protype::findOrFail($id);
    	return view('main.admin.manage_project.project_type_edit',compact('data'));
    }

    public function update_project_type(Request $request,$id)
    {
    	$request->validate([
            'name' => 'required'
        ]);

        $data = Protype::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect(route('project-type-list-page'))->with('success','Data Updated Successfully...!!!');
    }

    public function destroy($id)
    {
        $check=DB::table('projects')->where('prjtype',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Project Type Depends on Other table...!!!');  
        }else{
            $delete = Protype::findOrFail($id);
            $delete->delete();
            return redirect(route('project-type-list-page'))->with('success', 'Project Type Delete Successfully...!!!');
        }
    } 
}
