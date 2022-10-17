<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountClass;

class ClassController extends Controller
{
    public function index()
    {
        $class=AccountClass::get();
        return view('main.admin.accounts.class',compact('class'));
    }
}
