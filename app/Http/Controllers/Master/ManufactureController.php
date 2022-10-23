<?php

namespace App\Http\Controllers\Master;

use App\Manufacture;
use App\Http\Requests\ManufactureRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;

class ManufactureController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $manufactures = Manufacture::get();
          }else{
            $manufactures = Manufacture::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
       
        return view('main.admin.master.manufacturerlist',compact('manufactures'));
    }

    public function create()
    {
        return view('main.admin.master.manufacturercreate');
    }

    public function store(ManufactureRequest $request)
    {
        // dd($request->toArray());
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Manufacture();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('manufacture-list'))->with('success','Manufacture inserted successful');
    }

    public function edit($id)
    {
        $manufacture = Manufacture::find($id);
        return view('main.admin.master.manufactureredit',compact('manufacture'));
    }

    public function update(ManufactureRequest $request,$id)
    {
        $manufacture=Manufacture::findOrFail($id);
        // dd($manufacture);
        $manufacture->update($request->all());
        return redirect(route('manufacture-list'))->with('success','Manufacture updated successful');
    }

    public function destroy($id)
    {
        $check=DB::table('products')->where('manufac_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Manufacture Depends on Other table...!!!');  
        }else{
            $delete = Manufacture::findOrFail($id);
            $delete->delete();
            return redirect(route('manufacture-list'))->with('success','Manufacture Deleted successful');
        }
    }
}
