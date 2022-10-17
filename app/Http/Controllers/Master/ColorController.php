<?php

namespace App\Http\Controllers\Master;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::get();
        return view('main.admin.master.colorlist',compact('colors'));
    }

    public function create()
    {
        return view('main.admin.master.colorcreate');
    }

    public function store(ColorRequest $request)
    {
        // dd($request->all());
        Color::create($request->all());
        return redirect(route('color-create-route'))->with('success','Color Inserted Successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $color = Color::find($id);
        return view('main.admin.master.coloredit',compact('color'));
    }

    public function update(ColorRequest $request,$id)
    {
        $color=Color::findOrFail($id);
        $color->update($request->all());
        return redirect(route('color-list'))->with('success','Color Updated Successfully');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        // dd($color);
        return redirect(route('color-list'))->with('success','Color Deleted Successfully');
    }

}
