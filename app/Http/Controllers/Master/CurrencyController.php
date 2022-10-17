<?php

namespace App\Http\Controllers\Master;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class CurrencyController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
            $currencies=Currency::get();
        }else{
            $currencies=Currency::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        
        return view('main.admin.master.currencylist',compact('currencies'));
    }

    public function create()
    {
        return view('main.admin.master.currencycreate');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Currency();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
        return redirect(route('currency-list'))->with('success','Data Inserted successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $currency = Currency::find($id);
        return view('main.admin.master.currencyedit',compact('currency'));
    }

    public function update(Request $request,$id)
    {
        $currency=Currency::findOrFail($id);
        $currency->update($request->all());
        return redirect(route('currency-list'))->with('success','Data Updated successfully');
    }

}
