<?php

namespace App\Http\Controllers\Master;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;

use Auth;
use DB;
use Redirect;

class CountryController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $countries = Country::get();
        }else{
            $countries = Country::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
       
        return view('main.admin.master.countrylist',compact('countries'));
    }

    public function create()
    {
        return view('main.admin.master.countrycreate');
    }

    public function store(CountryRequest $request)
    {
        // dd($request->all());
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Country();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('country-list'))->with('success','Country Inserted Successfully');
    }

    public function edit($id)
    {
        $country  = Country::find($id);
        return view('main.admin.master.countryedit',compact('country'));
    }

    public function update(CountryRequest $request,$id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());
        return redirect(route('country-list'))->with('success','Country Updated Successfully');
    }

    public function destroy($id)
    {
        $check=DB::table('products')->where('country_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Country Depends on Other table...!!!');  
        }else{
            $delete = Country::findOrFail($id);
            $delete->delete();
            return redirect(route('country-list'))->with('success','Country Deleted Successfully');
        }
    }
}
