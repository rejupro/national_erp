<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;

class SubCategoryController extends Controller
{
    public function index()
    {
         if(Auth::User()->brand_id==1){
            $subcategorys = SubCategory::get();
         }else{
            $subcategorys = SubCategory::where('brid',Auth::User()->brand_id)->get();
         }
        // dd($subcategorys->toArray());
        return view('main.admin.productsetup.product_subcategory_list',compact('subcategorys'));
    }

    public function create()
    {
        if(Auth::User()->brand_id==1){
            $categorys = Category::get();
         }else{
            $categorys = Category::where('brid',Auth::User()->brand_id)->get();
         }
        return view('main.admin.productsetup.product_subcategory_create',compact('categorys'));
    }
    public function store(Request $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new SubCategory();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        // dd($request->toArray());
        //SubCategory::create($request->all());
        return redirect(route('subcategory-list'))->withErrors(['Subcategory Added Successfully...!!!']);
    }
    public function edit($id)
    {
        if(Auth::User()->brand_id==1){
            $categorys = Category::get();
         }else{
            $categorys = Category::where('brid',Auth::User()->brand_id)->get();
         }
        $subcategory = SubCategory::find($id);
        // dd($subcategory->toArray());
        return view('main.admin.productsetup.product_subcategory_edit',compact('subcategory','categorys'));
    }
    public function update(Request $request,$id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());
        return redirect(route('subcategory-list'))->withErrors(['Subcategory Update Successfully...!!!']);
    }
    public function destroy($id)
    {
        $check=DB::table('products')->where('sub_cat_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->withErrors(['Subcategory Depends on Other table...!!!']);  
        }else{
            $delete = Subcategory::findOrFail($id);
            $delete->delete();
            return redirect(route('subcategory-list'))->withErrors(['Subcategory Delete Successfully...!!!']);
        }
    }


}
