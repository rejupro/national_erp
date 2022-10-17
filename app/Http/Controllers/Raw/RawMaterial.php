<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RawMaterial extends Controller
{
    public function index(){
        return view('main.admin.rawmaterial.rawmaterial_list');
    }
}
