<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ContactMessage;
use Auth;
use DB;
use Redirect;

class MessageController extends Controller
{
    public function index()
    {
        $message = ContactMessage::orderBy('created_at','desc')->get();
        return view('main.admin.message.listmessage',compact('message'));
    }

    public function view_full_message($id)
    {
        $message = ContactMessage::where('id',$id)->first();
        return view('main.admin.message.specific_message',compact('message'));
    }
}
