<?php

namespace App\Http\Controllers\Inventory;

use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::get();
        return view('main.admin.inventory.branch_list',compact('branches'));
    }

    public function create()
    {
        return view('main.admin.inventory.branch_create');
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        Branch::create($request->all());
        return redirect(route('branch-create-route'));
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('main.admin.inventory.branch_edit',compact('branch'));
    }
    public function update(Request $request,$id)
    {
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        return redirect(route('branch-list'));
    }
    public function destroy($id)
    {
        $branch=Branch::findOrFail($id);
        $branch->delete();
        return redirect(route('branch-list'));
    }
}
