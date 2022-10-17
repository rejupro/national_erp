<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index(){
        return view('main.admin.report.report');
    }
}
