<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RawProductController extends Controller
{
    public function rawproduct_create(){
        return view('main.admin.rawmaterial.rawproduct.rawproduct_create');
    }
}
