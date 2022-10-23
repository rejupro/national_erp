<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Purchase;
use App\Project;
use App\Sale;
use App\Product;
// use App\Purchase;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $purchases = Purchase::orderBy('created_at','desc')->get();
        $projects = Project::orderBy('created_at','desc')->get();
        $sales = Sale::orderBy('created_at','desc')->get();
        $products = Sale::orderBy('created_at','desc')->get();
    
        return view('main.admin.dashboard',compact('purchases','sales','projects','products'));
    }


    public function logout()
    {
    
        Auth::User()->logout();
        return redirect()->route('logout');
    }
}
