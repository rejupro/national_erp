<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $categorys = Category::get();
         }else{
            $categorys = Category::where('brid',Auth::User()->brand_id)->get();
         }
        // dd($category->toArray());
        return view('main.admin.productsetup.product_category_list',compact('categorys'));
    }

    public function create()
    {
        return view('main.admin.productsetup.product_category_create');
    }
    public function store(Request $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Category();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        // dd($request->toArray());
        //Category::create($request->all());
        return redirect(route('category-list'))->withErrors(['Category Added Successfully...!!!']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('main.admin.productsetup.product_category_edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect(route('category-list'))->withErrors(['Category Update Successfully...!!!']);
    }
    public function destroy($id)
    {
        $check=DB::table('products')->where('cat_id',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->withErrors(['Category Depends on Other table...!!!']);  
        }else{
            $delete = Category::findOrFail($id);
            $delete->delete();
            return redirect(route('category-list'))->withErrors(['Category Delete Successfully...!!!']);
        }
    }
}
