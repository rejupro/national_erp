<?php

namespace App\Http\Controllers\DailyProcess;

use App\Expensehead;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseHeadRequest;
use Illuminate\Http\Request;
use App\Headtype;
use Auth;

class ExpenseHeadController extends Controller
{
    public function index()
    {
        
        if(Auth::User()->brand_id==1){
            $expenses = Expensehead::get();
          }else{
            $expenses = Expensehead::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
          }
        return view('main.admin.dailyprocess.expenses_head_list',compact('expenses'));
    }
    public function create()
    {
        $data = Headtype::orderBy('id', 'DESC')->get();
        return view('main.admin.dailyprocess.expenses_head_create', compact('data'));
    }
    public function store(ExpenseHeadRequest $request)
    {
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;

        $data = new Expensehead();
        $input = $request->all();
        $input['brid']= $brid;
        $input['uid']= $uid;
        $data->fill($input)->save();
    	$datas = Expensehead::orderBy('created_at','desc')->get();
        return redirect(route('expense-head-list'))->with('success', 'Expense Head Added Successfully...!!!');
    }
    public function edit($id)
    {
        $data = Headtype::orderBy('id', 'DESC')->get();
        $expense = Expensehead::find($id);
        return view('main.admin.dailyprocess.expenses_head_edit',compact('expense', 'data'));
    }
    public function update(ExpenseHeadRequest $request,$id)
    {
        $expense = Expensehead::findOrFail($id);
        $expense->update($request->all());
        return redirect(route('expense-head-list'))->with('success', 'Expense Head Updated Successfully...!!!');
    }

    public function destroy($id)
    {
        $expense = Expensehead::findOrFail($id);
        $expense->delete();
        // dd($group);
        return redirect(route('expense-head-list'))->with('success', 'Expense Head Deleted Successfully...!!!');
    }
}
