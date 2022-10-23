<?php

namespace App\Http\Controllers\Master;

use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::get();
        return view('main.admin.master.districtlist',compact('districts'));
    }

    public function create()
    {
        return view('main.admin.master.districtcreate');
    }

    public function store(DistrictRequest $request)
    {
        // dd($request->all());
        District::create($request->all());
        return redirect(route('district-create-route'))->with('success','District Inserted Successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $district = District::find($id);
        return view('main.admin.master.districtedit',compact('district'));
    }

    public function update(Request $request,$id)
    {
        $district=District::findOrFail($id);
        $district->update($request->all());
        return redirect(route('district-list'))->with('success','District Updated Successfully');
    }
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        // dd($district);
        return redirect(route('district-list'))->with('success','District Deleted Successfully');
    }
}
