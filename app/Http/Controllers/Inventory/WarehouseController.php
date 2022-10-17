<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Warehouse;
use App\Branch;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::get();
        return view('main.admin.inventory.warehouse_list',compact('warehouses'));
    }

    public function create()
    {   
        $branch = Branch::orderBy('created_at','desc')->get();
        return view('main.admin.inventory.warehouse_create',compact('branch'));
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        Warehouse::insert([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return redirect(route('warehouse-create-route'))->withErrors(['Warehouse Added Successfully...!!!']);
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        $branch = Branch::orderBy('created_at','desc')->get();
        return view('main.admin.inventory.warehouse_edit',compact('warehouse','branch'));
    }
    public function update(Request $request,$id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->update($request->all());
        return redirect(route('warehouse-list'))->withErrors(['Warehouse Updated Successfully...!!!']);
    }
    public function destroy($id)
    {
        $warehouse=Warehouse::findOrFail($id);
        $warehouse->delete();
        return redirect(route('warehouse-list'))->withErrors(['Warehouse Deleted Successfully...!!!']);
    }
}
