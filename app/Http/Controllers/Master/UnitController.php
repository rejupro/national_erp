<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Unit;
use Illuminate\Http\Request;

use Auth;
use DB;
use Redirect;

class UnitController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $units = Unit::get();
        }else{
            $units = Unit::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        
        // dd($units->toArray());
        return view('main.admin.master.unitlist',compact('units'));
    }

    public function create()
    {
        return view('main.admin.master.unitcreate');
    }

    public function store(UnitRequest $request)
    {
        // dd($request->all());
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Unit();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('unit-list'))->with('success','Data Inserted successfully');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('main.admin.master.unitedit',compact('unit'));
    }

    public function update(UnitRequest $request,$id)
    {
        $unit=Unit::findOrFail($id);
        $unit->update($request->all());
        return redirect(route('unit-list'))->with('success','Data Updated successfully');
    }
    public function destroy($id)
    {
        $check=DB::table('products')->where('unit_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Unit Depends on Other table...!!!');  
        }else{
            $delete = Unit::findOrFail($id);
            $delete->delete();
            return redirect(route('unit-list'))->with('success','Data Deleted successfully');
        }
    }
}
