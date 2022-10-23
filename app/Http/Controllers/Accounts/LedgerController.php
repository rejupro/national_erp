<?php

namespace App\Http\Controllers\Accounts;

use App\Group;
use App\Http\Controllers\Controller;
use App\Ledger;
use App\SubGroup;
use Illuminate\Http\Request;
use DB;

use Auth;

class LedgerController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
          $ledgers = Ledger::with(['group','subgroup'])->get();
        }else{
            $ledgers = Ledger::where('brid',Auth::User()->brand_id)->with(['group','subgroup'])->get();
        }

        return view('main.admin.accounts.ledgerlist',compact('ledgers'));
    }

    public function create()
    {
        $groups=Group::get();
        $subgroups=SubGroup::get();
        $codes='LEG-NO-' . Ledger::get()->max('id');
        return view('main.admin.accounts.ledgercreate',compact('groups','subgroups','codes'));
    }

    public function store(Request $request)
    {
       
        $brid= Auth::User()->brand_id;
        $uid = Auth::User()->id;
        $data = new Ledger();
        $input = $request->all();
        $input['uid']= $uid;
        $input['brid']= $brid;
        
        $data->fill($input)->save();
        return redirect(route('ledger-list'))->with('success', 'Ledger  Added Successfully...!!!');
    }
    public function edit($id)
    {
        $groups = Group::get();
        $subgroups = SubGroup::get();
        $ledger=Ledger::find($id);
        $codes='LEG-NO-' . Ledger::get();
        return view('main.admin.accounts.ledgeredit',compact('groups','subgroups','codes','ledger'));
    }

    public function update(Request $request,$id)
    {
        $ledger = Ledger::findOrFail($id);
        $ledger->update($request->all());
        return redirect(route('ledger-list'))->with('success', 'Ledger  Updated Successfully...!!!');
    }
    public function destroy($id)
    {
        $check=DB::table('journal_voucher_details')->where('debit_sub_group_id',$id)->get();
        $checkcount = $check->count();
        if($checkcount>0){
            return Redirect::back()->with('warning', 'Ledger Depends on Other table...!!!');  
        }else{
            $delete = Ledger::findOrFail($id);
            $delete->delete();
            return redirect(route('ledger-list'))->with('success', 'Ledger  Updated Successfully...!!!');
        }
        
    }

}
