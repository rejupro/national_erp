<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Size;
use Illuminate\Http\Request;
use Auth;
class SizeController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $sizes=Size::get();
        }else{
            $sizes=Size::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
       
        // dd($sizes->toArray());
        return view('main.admin.master.sizelist',compact('sizes'));
    }

    public function create()
    {
        return view('main.admin.master.sizecreate');
    }

    public function store(Request $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Size();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('size-list'))->with('success','Data inserted successfully');
    }
    public function edit($id)
    {
        // dd($id);
        $size = Size::find($id);
        return view('main.admin.master.sizeedit',compact('size'));
    }

    public function update(Request $request,$id)
    {
        $size=Size::findOrFail($id);
        $size->update($request->all());
        return redirect(route('size-list'))->with('success','Data Updated successfully');
    }

    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        // dd($brand);
        return redirect(route('size-list'))->with('success','Data Deleted successfully');
    }

}
