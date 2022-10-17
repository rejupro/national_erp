<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use App\Brand;
use App\Sale;
use Auth;
use DB;
class inventoryreportController extends Controller
{
    public function productList()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        if(Auth::User()->brand_id==1){
            $results = DB::table('products')
                    ->leftjoin('categories','categories.id','=','products.cat_id')
                    ->leftjoin('brands','brands.id','=','products.brand_id')
                    ->leftjoin('units','units.id','=','products.unit_id')
                    ->select('products.*','categories.name as cat_name','brands.name as brand_name','units.name as unit_name')
                    ->get();
            // $results = \App\Product::with(['category', 'brand', 'unit'])->get();
         }else{
            $results = DB::table('products')
                    ->leftjoin('categories','categories.id','=','products.cat_id')
                    ->leftjoin('brands','brands.id','=','products.brand_id')
                    ->leftjoin('units','units.id','=','products.unit_id')
                    ->where('products.brid',Auth::User()->brand_id)
                    ->select('products.*','categories.name as cat_name','brands.name as brand_name','units.name as unit_name')
                    ->get();
            // $results = \App\Product::with(['category', 'brand', 'unit'])->where('brid',Auth::User()->brand_id)->get();
         }

       
        // dd($results->toArray());


        return view('main.admin.report.rep_inv_productList',compact('categorys','subcategorys','brands', 'results'));
    }

    public function salesList()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();

        if(Auth::User()->brand_id==1){
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }else{
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->where('sales.branch_id',Auth::User()->brand_id)
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }
        //$results = \App\Sale::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.report.rep_invSerialRecord',compact('categorys','subcategorys','brands', 'results'));
    }

    public function invSummary()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        if(Auth::User()->brand_id==1){
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }else{
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->where('sales.branch_id',Auth::User()->brand_id)
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }
       // $results = \App\Sale::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.report.rep_invSummary',compact('categorys','subcategorys','brands', 'results'));
    }
    public function invPeriodic()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();

        if(Auth::User()->brand_id==1){
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }else{
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->where('sales.branch_id',Auth::User()->brand_id)
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }
        //$results = \App\Sale::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.report.rep_invPeriodic',compact('categorys','subcategorys','brands', 'results'));
    }
    public function invValuation()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        if(Auth::User()->brand_id==1){
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }else{
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->where('sales.branch_id',Auth::User()->brand_id)
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }
        //$results = \App\Sale::with(['project'])->get();
        return view('main.admin.report.rep_invValuation',compact('categorys','subcategorys','brands', 'results'));
    }
    public function invPerioValuation()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        if(Auth::User()->brand_id==1){
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }else{
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->where('sales.branch_id',Auth::User()->brand_id)
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }
       // $results = \App\Sale::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.report.rep_invValuation',compact('categorys','subcategorys','brands', 'results'));
    }
    public function inv_overview()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        $subcategorys = SubCategory::all();
        if(Auth::User()->brand_id==1){
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }else{
            $results = DB::table('sales')
            ->join('projects','projects.id','=','sales.project_id')
            ->where('sales.branch_id',Auth::User()->brand_id)
            ->select('sales.*','projects.name as project_name')
            ->orderBy('created_at','desc')->get();
        }
        //$results = \App\Sale::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.report.rep_invOverview',compact('categorys','subcategorys','brands', 'results'));
    }
}
