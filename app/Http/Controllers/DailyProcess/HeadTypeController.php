<?php

namespace App\Http\Controllers\DailyProcess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Headtype;

class HeadTypeController extends Controller
{
    public function index(){
        $data = Headtype::orderBy('id','desc')->get();
        return view('main.admin.dailyprocess.headtype_list', compact('data'));
    }
    public function create(){
        return view('main.admin.dailyprocess.headtype_create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $store = Headtype::insert([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if($store){
            return redirect(route('expense-typelist'))->with('success', 'Data Inserted Successfule');
        }else{
            return redirect(route('expense-typelist'))->with('warning', 'Data Inserted Failed');
        }

    }
    public function edit($id){
        $data = Headtype::where('id', $id)->first();
        return view('main.admin.dailyprocess.headtype_edit', compact('data'));
    }
    public function update($id, Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $update = Headtype::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        if($update){
            return redirect(route('expense-typelist'))->with('success', 'Data Updated Successfule');
        }else{
            return redirect(route('expense-typelist'))->with('warning', 'Data updated Failed');
        }
    }
}
