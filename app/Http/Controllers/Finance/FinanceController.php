<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountClass;
use App\Group;
use App\SubGroup;
use App\Expensehead;
use App\ExpenseVaucher;
use App\ExpenseVaucherDetails;
use App\JournalVoucher;
use App\JournalVoucherDetail;
use App\Mobileaccount;
use App\PaymentVaucher;
use App\Paymentdetail;
use App\Receivevoucher;
use App\Receivedetail;
use App\Ledger;
use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Supplier;
use Redirect;
use Auth;
use DB;
use Validator;

class FinanceController extends Controller
{

    public function profit_and_loss()
    {
        if(Auth::User()->brand_id==1){
            $expense = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 4)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
            $revenue = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 5)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }else{
            $expense = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 4)
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
            $revenue = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 5)
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }
        return view('main.admin.finance.fin_profitandloss',compact('expense','revenue'));
    }
    

    public function balance_sheet()
    {
        if(Auth::User()->brand_id==1){
            $assets = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 1)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
            $liabilities = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 2)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
            $equity = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 3)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }else{
            $assets = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 1)
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
            $liabilities = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 2)
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
            $equity = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('groups.class_name', 3)
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }
        return view('main.admin.finance.fin_blncsheet',compact('assets','liabilities','equity'));
    }

    public function trial_balance()
    {
        if(Auth::User()->brand_id==1){
            $trial_debit = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }else{
            $trial_debit = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }
        return view('main.admin.finance.fin_trialblnc',compact('trial_debit'));
    }

    public function trial_balance_filter_by_date(Request $request)
    {
        $start_date = date('Y-d-m H:i:s', strtotime($request->start_date));
        $end_date = date('Y-d-m H:i:s', strtotime($request->end_date));
        if(Auth::User()->brand_id==1){
            $trial_debit = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->whereBetween('journal_voucher_details.created_at', [$start_date, $end_date])
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }else{
            $trial_debit = DB::table('groups')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->whereBetween('journal_voucher_details.created_at', [$start_date, $end_date])
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }
        return view('main.admin.finance.fin_trialblnc',compact('trial_debit'));
    }

    public function chart_of_account()
    {
        if(Auth::User()->brand_id==1){
            $chart = DB::table('account_classes')
            ->leftJoin('groups','groups.class_name','=','account_classes.id')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->select('account_classes.name as class_name','account_classes.id as class_id','groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }else{
            $chart = DB::table('account_classes')
            ->leftJoin('groups','groups.class_name','=','account_classes.id')
            ->leftJoin('sub_groups','sub_groups.grp_id','=','groups.id')
            ->leftJoin('journal_voucher_details','journal_voucher_details.debit_sub_group_id','=','sub_groups.id')
            ->leftJoin('ledgers','ledgers.id','=','journal_voucher_details.debit_ledger_id')
            ->where('journal_voucher_details.brid',Auth::User()->brand_id)
            ->select('account_classes.name as class_name','account_classes.id as class_id','groups.id as group_id','groups.name as group_name','sub_groups.name as subgroup_name','sub_groups.id as subgroup_id','ledgers.name as ledger_name','ledgers.id as ledger_id','journal_voucher_details.debit_amount','journal_voucher_details.credit_amount')
            ->get();
        }
        return view('main.admin.finance.fin_chartofacc',compact('chart'));
    }
}
