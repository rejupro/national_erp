<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class localsettingController extends Controller
{
    public function index()
    {
        return view('main.admin.company.local_setting');
    }
}
