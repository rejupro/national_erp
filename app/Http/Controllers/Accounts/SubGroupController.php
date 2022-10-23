<?php

namespace App\Http\Controllers\Accounts;

use App\Group;
use App\Http\Controllers\Controller;
use App\SubGroup;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use DB;

class SubGroupController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $subgroups = SubGroup::with(['group'])->get();
        }else{
            $subgroups = SubGroup::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->with(['group'])->get();
        }
       
       
        return view('main.admin.accounts.subgrouplist',compact('subgroups'));
    }

    public function create()
    {

        if(Auth::User()->brand_id==1){
            $groups=Group::get();
        }else{
            $groups=Group::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }


        $subgroup = SubGroup::get();
        
        return view('main.admin.accounts.subgroupcreate',compact('groups','subgroup'));
    }

    public function store(Request $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new SubGroup();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
           
        return redirect(route('subgroup-list'))->with('success', 'Sub-Group Added Successfully...!!!');
    }
    public function edit($id)
    {
        if(Auth::User()->brand_id==1){
            $groups=Group::get();
        }else{
            $groups=Group::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        $subgroup = SubGroup::find($id);
        return view('main.admin.accounts.subgroupedit',compact('groups','subgroup'));
    }

    public function update(Request $request,$id)
    {
        $subgroup = SubGroup::findOrFail($id);
        $subgroup->update($request->all());
        return redirect(route('subgroup-list'))->with('success', 'Sub-Group Updated Successfully...!!!');
    }
    public function destroy($id)
    {
        $check1=DB::table('journal_voucher_details')->where('debit_sub_group_id',$id)->get();
        $checkcount1 = $check1->count();
        $check2=DB::table('ledgers')->where('sub_grp_id',$id)->get();
        $checkcount2 = $check2->count();
        if($checkcount1>0 || $checkcount2>0){
            return Redirect::back()->with('success', 'Sub-Group Depends on Other table...!!!');  
        }else{
            $delete = SubGroup::findOrFail($id);
            $delete->delete();
            return redirect(route('subgroup-list'))->with('success', 'Sub-Group Deleted Successfully...!!!');
        }
    }

}
