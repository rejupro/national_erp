<?php

namespace App\Http\Controllers\Client;

use App\C_Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;

class GroupController extends Controller
{
    public function index()
    {
        
        $cgroups = C_Group::get();
        return view('main.admin.client_setup.group_list',compact('cgroups'));
    }

    public function create()
    {
        return view('main.admin.client_setup.group_create');
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        $store = C_Group::create($request->all());
        if($store){
            return redirect(route('group-create-route'))->with('success', 'Data Inserted Successfully');
        }
        
    }

    public function edit($id)
    {

        $cgroup = C_Group::find($id);
        return view('main.admin.client_setup.group_edit',compact('cgroup'));
    }

    public function update(Request $request,$id)
    {
        $cgroup = C_Group::findOrFail($id);
        $update = $cgroup->update($request->all());
        if($update){
            return redirect(route('group-list'))->with('success', 'Data Updated Successfully');
        }
        
    }
    public function destroy($id)
    {
        $check1=DB::table('customers')->where('grp_id',$id)->get();
        $checkcount1 = $check1->count();
        //dd($checkcount);
        if(($checkcount1>0)){
            return Redirect::back()->with('warning', 'Groups Depends on Other table...!!!');  
        }else{
           // dd($checkcount1);
            $delete = C_Group::findOrFail($id);
            $delete->delete();
            return redirect(route('group-list'))->with('success', 'Data Deleted Successfully');
        }
    }
}
