<?php

namespace App\Http\Controllers\Accounts;

use App\AccountClass;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use DB;

class GroupController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $groups=Group::with(['class'])->get();
        }else{
            $groups=Group::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->with(['class'])->get();
        }

        return view('main.admin.accounts.grouplist',compact('groups'));
    }

    public function create()
    {
        $class = AccountClass::get();
        $results = 'GRP-NO-00' . Group::get()->max('id');
        // dd($account_classes->toArray());
        return view('main.admin.accounts.groupcreate',compact('class','results'));
    }

    public function store(Request $request)
    {
           // dd($request->all());
           $brid= Auth::User()->brand_id;
           $uid = Auth::User()->id;
           $data = new Group();
           $input = $request->all();
           $input['brid']= $brid;
           $input['uid']= $uid;
           $data->fill($input)->save();
           return redirect(route('acc-group-list'))->with('success', 'Group Added Successfully...!!!');
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $account_classes = AccountClass::get();
        return view('main.admin.accounts.groupedit',compact('group','account_classes'));
    }

    public function update(Request $request,$id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());
        return redirect(route('acc-group-list'))->with('success', 'Group Updated Successfully...!!!');
    }
    public function destroy($id)
    {
        $check1=DB::table('sub_groups')->where('grp_id',$id)->get();
        $checkcount1 = $check1->count();
        $check2=DB::table('ledgers')->where('grp_id',$id)->get();
        $checkcount2 = $check2->count();
        //dd($checkcount);
        if($checkcount1>0 || $checkcount2>0){
            return Redirect::back()->with('warning', 'Group Depends on Other table...!!!');  
        }else{
            $delete = Group::findOrFail($id);
            $delete->delete();
            return redirect(route('acc-group-list'))->with('success', 'Group Deleted Successfully...!!!');
        }
       
    }
}
