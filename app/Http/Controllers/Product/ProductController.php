<?php

namespace App\Http\Controllers\Product;

use App\Brand;
use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Manufacture;
use App\Product;
use App\SubCategory;
use App\Unit;
use Illuminate\Http\Request;
use App\Purchase_datail;
use Auth;
use Redirect;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $products = Product::with(['category','subcategory','brand','manufacture','unit'])->get();
         }else{
            $products = Product::with(['category','subcategory','brand','manufacture','unit'])->where('brid',Auth::User()->brand_id)->get();
         }
       
        // dd($products->toArray());
        return view('main.admin.productsetup.product_list',compact('products'));
    }

    public function create()
    {   
        

        if(Auth::User()->brand_id==1){
            $categorys = Category::get();
         }else{
            $categorys = Category::where('brid',Auth::User()->brand_id)->get();
         }
         if(Auth::User()->brand_id==1){
            $subcategorys = SubCategory::get();
         }else{
            $subcategorys = SubCategory::where('brid',Auth::User()->brand_id)->get();
         }
      
        $brands = Brand::get();
        $manufactures = Manufacture::get();
        $units = Unit::get();
        $countrys = Country::get();
        $pro_track = 'PO-NO' . Product::get()->max('id');
        // dd($manufactures->toArray());
        return view('main.admin.productsetup.product_create',
        compact('categorys','subcategorys','brands','manufactures','units','countrys','pro_track'));
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Product();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $image=$request->file('avater');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='upload/Products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $input['avater']=$image_url;
            $data->fill($input)->save();
        return Redirect::back()->with('success', 'Data Added Successfully...!!!');
        }
        else{
            $data->fill($input)->save();   
            return Redirect::back()->with('success', 'Data Added Successfully...!!!');
        }
        // dd($request->toArray());
       // Product::create($request->all());
       // return redirect(route('product-list'));
    }
    public function edit($id)
    {
        if(Auth::User()->brand_id==1){
            $categorys = Category::get();
         }else{
            $categorys = Category::where('brid',Auth::User()->brand_id)->get();
         }
         if(Auth::User()->brand_id==1){
            $subcategorys = SubCategory::get();
         }else{
            $subcategorys = SubCategory::where('brid',Auth::User()->brand_id)->get();
         }
        $brands = Brand::get();
        $manufactures = Manufacture::get();
        $units = Unit::get();
        $countrys = Country::get();
        $product = Product::find($id);
        // dd($Product->toArray());
        return view('main.admin.productsetup.product_edit',
        compact('categorys','subcategorys','brands','manufactures','units','countrys','product'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect(route('product-list'))->with('success', 'Product Updated Successfully...!!!');
    }
    public function destroy($id)
    {
        $check=DB::table('purchase_details')->where('item_id',$id)->get();
        $checkcount = $check->count();
        //dd($checkcount);
        if($checkcount>0){
            return Redirect::back()->with('warning','Product Depends on Other table...!!!');  
        }else{
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect(route('product-list'))->with('success', 'Product Delete Successfully...!!!');
        }
       
    }
}
