<?php

namespace App\Http\Controllers\Master;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;

class BrandController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $brands=Brand::get();
          }else{
            $brands=Brand::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
        return view('main.admin.master.brandlist',compact('brands'));
    }

    public function create()
    {
        return view('main.admin.master.brandcreate');
    }

    public function store(BrandRequest $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Brand();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('brand-list'))->with('success','Brand Added successfully');
    }
    public function edit($id)
    {
        // dd($id);
        $brand = Brand::find($id);
        return view('main.admin.master.brandedit',compact('brand'));
    }

    public function update(BrandRequest $request,$id)
    {
        $brand=Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect(route('brand-list'))->with('success', 'Brand Updated Successfully');
    }

    public function destroy($id)
    {
        $check=DB::table('products')->where('brand_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Brand Depends on Other table...!!!');  
        }else{
            $delete = Brand::findOrFail($id);
            $delete->delete();
            return redirect(route('brand-list'))->with('success', 'Brand Delete Successfully...!!!');
        }

    }
}
