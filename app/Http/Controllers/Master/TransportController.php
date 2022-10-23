<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransportRequest;
use App\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::get();
        // dd($transports->all());
        return view('main.admin.master.transporterlist',compact('transports'));
    }

    public function create()
    {
        return view('main.admin.master.transportercreate');
    }

    public function store(TransportRequest $request)
    {
        // dd($request->all());
        Transport::create($request->all());
        return redirect(route('transport-create-route'))->with('messages','successfull!!!');
    }

    public function edit($id)
    {
        $transport = Transport::find($id);

        return view('main.admin.master.transporteredit',compact('transport'));
    }

    public function update(Request $request,$id)
    {
        $transport = Transport::findOrFail($id);
        $transport->update($request->all());
        return redirect(route('transport-list'));
    }

    public function destroy($id)
    {
        $transport  = Transport::findOrFail($id);
        $transport->delete();
        return redirect(route('transport-list'));
    }
}
