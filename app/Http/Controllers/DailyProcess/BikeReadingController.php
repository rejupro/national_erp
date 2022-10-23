<?php

namespace App\Http\Controllers\DailyProcess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BikeRead;
use Redirect;
use DB;
use Validator;
use Carbon\Carbon;
use Auth;

class BikeReadingController extends Controller
{
    public function index()
    {
        $read = BikeRead::orderBy('created_at','desc')->get();
        return view('main.admin.bike_reading.bike_reading_list',compact('read'));
    }

    public function addpage()
    {
        $read = "";
        return view('main.admin.bike_reading.bike_reading_entry',compact('read'));
    }

    public function store(Request $request)
    {
        $input['read_date'] = $request->read_date;
        $input['bike_no'] = $request->bike_no;
        $input['open_read'] = $request->open_read;
        $input['oil_cost'] = $request->oil_cost;
        $input['end_read'] = $request->end_read;
        $input['service_cost'] = $request->service_cost;
        $input['comments'] = $request->comments;
        $input['created_by'] = Auth::User()->name;
        if(!empty($request->id)){
            $update = BikeRead::where('id',$request->id)->update($input);
            if($update){
                    return Redirect::back()->withErrors(['Bike Reading Report Updated Successfully...!!!']);  
                }else{
                    return Redirect::back()->withErrors(['Bike Reading Report Cannot Be Updated Successfully...!!!']);  
                }
        }else{
            $insert = BikeRead::insert($input);
            if($insert){
                    return Redirect::back()->withErrors(['Bike Reading Report Added Successfully...!!!']);  
                }else{
                    return Redirect::back()->withErrors(['Bike Reading Report Cannot Be Added Successfully...!!!']);  
                }
            }
    }

    public function editpage($id)
    {
        $read = BikeRead::orderBy('created_at','desc')->where('id',$id)->first();
        return view('main.admin.bike_reading.bike_reading_entry',compact('read'));
    }

    public function report(Request $request)
    {
        $read = BikeRead::orderBy('created_at','desc')
        ->whereBetween('read_date', [$request->from, $request->to])
        ->get();
        return view('main.admin.bike_reading.load_bike_reading_report',compact('read'));
        // code...load_bike_reading_report
    }
}
