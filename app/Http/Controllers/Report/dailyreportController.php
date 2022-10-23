<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purchase;
use Redirect;
use Auth;
use App\Branch;
use DB;
Use Str;
use Carbon\Carbon;
use App\Designation;
use App\Employee;
use App\Product;
use App\Project;
use App\Requisition;
use App\DailyExpenseModel;
use App\PaymentVaucher;
use App\DailyExpenseModelDetails;
use App\ExpenseVaucher;
use App\Purchase_detail;
use App\Sales_detail;

class dailyreportController extends Controller
{
    public function daicashst(Request $request){
       // $end = $request->end;
       $br=Auth::User()->brand_id;
        $request->validate([
            'start_date' => 'date',
            'end_date' => 'date',
            ]);
        if($request->brid!=''){
            $brid=$request->brid;
        }else{
         $brid=Auth::User()->brand_id;
        }
        if($request->start_date !=''){
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);
        }else{
            $start = Carbon::now();
            $end = Carbon::now();
        }
        
           
            if($brid==1){

                $purchases=DB::table('purchases')
                ->join('suppliers','suppliers.id','=','purchases.supid')
                ->select('purchases.*','suppliers.name as supname')
                ->where('purchases.paid','!=',0)
                ->whereDate('purchases.purchase_date','<=',$end->format('y-m-d'))
                ->whereDate('purchases.purchase_date','>=',$start->format('y-m-d'))->get();
                $purchasetotal = $purchases->sum("paid");
                
                $purdetails=Purchase_detail::with(['product','supplier'])->get();
               
    
                $sales=DB::table('sales')
                ->join('customers','customers.id','=','sales.cusid')
                ->select('sales.*','customers.name as cusname')
                ->where('sales.paid','!=',0)
                ->whereDate('sales.sales_date','<=',$end->format('y-m-d'))
                ->whereDate('sales.sales_date','>=',$start->format('y-m-d'))->get();
                $salestotal = $sales->sum("paid");
                $sadetails = Sales_detail::with(['product','supplier'])->get();
               //dd($sales);
                $receives=DB::table('receive_vouchers')
                ->join('projects','projects.id','=','receive_vouchers.project_id')
                ->select('receive_vouchers.*','projects.project_id as pname')
                ->whereDate('receive_vouchers.date','<=',$end->format('y-m-d'))
                ->whereDate('receive_vouchers.date','>=',$start->format('y-m-d'))->get();
                $receivetotal =$receives->sum("amount");
                
                $revdetails = DB::table('receive_details')->get();
                    
                $payments=DB::table('payment_vauchers')
                ->join('projects','projects.id','=','payment_vauchers.project_id')
                ->select('payment_vauchers.*','projects.project_id as pname')
                ->whereDate('payment_vauchers.date','<=',$end->format('y-m-d'))
                ->whereDate('payment_vauchers.date','>=',$start->format('y-m-d'))->get();
                $paymenttotal = $payments->sum("amount");
                //dd($payment);
                $payname[]='';
                $paydetails = DB::table('payment_details')->get();
                  
                        
    
               // dd($payname);
    
                $journals= DB::table('journal_vouchers')->whereDate('date','<=',$end->format('y-m-d'))
                ->whereDate('date','>=',$start->format('y-m-d'))->get();
                $journaltotal= $journals->sum("total");
    
    
    
                $expenses=ExpenseVaucher::with(['project'])->whereDate('date','<=',$end->format('y-m-d'))
                ->whereDate('date','>=',$start->format('y-m-d'))->get();
                $expensetotal=$expenses->sum("amount");
                $edetails = DB::table('expense_details')
                ->join('expenseheads','expenseheads.id','=','expense_details.expense_head')
                ->select('expense_details.*','expenseheads.name as expense_name')
                ->get();
    
                $dexpenses = DailyExpenseModel::with(['project','staff'])->whereDate('date','<=',$end->format('y-m-d'))
                ->whereDate('date','>=',$start->format('y-m-d'))->get();
                $ddetails = DailyExpenseModelDetails::with(['unit','types'])->get();
                $dexpensetotal=$dexpenses->sum("grand_total");
    
                //dd($dexpenses);
                $cashrecieve = DB::table('receive_vouchers')
                ->leftJoin('receive_details','receive_details.voucher_no','=','receive_vouchers.voucher_no')
                ->where('receive_details.receive_to','=','LE_5')
                ->whereDate('receive_vouchers.date','<=',$end->format('y-m-d'))
                ->whereDate('receive_vouchers.date','>=',$start->format('y-m-d'))
                ->groupBy('receive_details.voucher_no')
                ->sum("receive_details.amount");
                $cashpayment = DB::table('payment_vauchers')
                ->leftJoin('payment_details','payment_details.voucher_no','=','payment_vauchers.voucher_no')
                ->where('payment_details.payment_source','=','LE_5')
                ->whereDate('payment_vauchers.date','<=',$end->format('y-m-d'))
                ->whereDate('payment_vauchers.date','>=',$start->format('y-m-d'))
                ->groupBy('payment_details.voucher_no')
                ->sum("payment_details.amount");
               
                $noncashrecieve = DB::table('receive_vouchers')
                ->leftJoin('receive_details','receive_details.voucher_no','=','receive_vouchers.voucher_no')
                ->where('receive_details.receive_to','!=','LE_5')
                ->whereDate('receive_vouchers.date','<=',$end->format('y-m-d'))
                ->whereDate('receive_vouchers.date','>=',$start->format('y-m-d'))
                ->groupBy('receive_details.voucher_no')
                ->sum("receive_details.amount");
                $noncashpayment = DB::table('payment_vauchers')
                ->leftJoin('payment_details','payment_details.voucher_no','=','payment_vauchers.voucher_no')
                ->where('payment_details.payment_source','!=','LE_5')
                ->whereDate('payment_vauchers.date','<=',$end->format('y-m-d'))
                ->whereDate('payment_vauchers.date','>=',$start->format('y-m-d'))
                ->groupBy('payment_details.voucher_no')
                ->sum("payment_details.amount");



            }else{
                $purchases=DB::table('purchases')
                ->join('suppliers','suppliers.id','=','purchases.supid')
                ->select('purchases.*','suppliers.name as supname')
                ->where('purchases.branch_id',$brid)
                ->where('purchases.paid','!=',0)
                ->whereDate('purchases.purchase_date','<=',$end->format('y-m-d'))
                ->whereDate('purchases.purchase_date','>=',$start->format('y-m-d'))->get();
                $purchasetotal = $purchases->sum("paid");
                
                $purdetails=Purchase_detail::with(['product','supplier'])->get();
               
    
                $sales=DB::table('sales')
                ->join('customers','customers.id','=','sales.cusid')
                ->select('sales.*','customers.name as cusname')
                ->where('sales.branch_id',$brid)
                ->where('sales.paid','!=',0)
                ->whereDate('sales.sales_date','<=',$end->format('y-m-d'))
                ->whereDate('sales.sales_date','>=',$start->format('y-m-d'))->get();
                $salestotal = $sales->sum("paid");
                $sadetails = Sales_detail::with(['product','supplier'])->get();
               //dd($sales);
                $receives=DB::table('receive_vouchers')
                ->select('receive_vouchers.*')
                ->where('receive_vouchers.bid',$brid)->whereDate('receive_vouchers.date','<=',$end->format('y-m-d'))
                ->whereDate('receive_vouchers.date','>=',$start->format('y-m-d'))->get();
                $receivetotal =$receives->sum("amount");
                $revdetails = DB::table('receive_details')->get();
               // dd($receivetotal);
                    
                $payments=DB::table('payment_vauchers')
                ->select('payment_vauchers.*')
                ->where('payment_vauchers.bid',$brid)->whereDate('payment_vauchers.date','<=',$end->format('y-m-d'))
                ->whereDate('payment_vauchers.date','>=',$start->format('y-m-d'))->get();
                $paymenttotal = $payments->sum("amount");
                //dd($payment);
                $payname[]='';
                $paydetails = DB::table('payment_details')->get();
                  
                        
    
               // dd($payname);
    
                $journals= DB::table('journal_vouchers')->where('brid',$brid)->whereDate('date','<=',$end->format('y-m-d'))
                ->whereDate('date','>=',$start->format('y-m-d'))->get();
                $journaltotal= $journals->sum("total");
    
    
                $expenses=ExpenseVaucher::with(['project'])->where('bid',$brid)->whereDate('date','<=',$end->format('y-m-d'))
                ->whereDate('date','>=',$start->format('y-m-d'))->get();
                $expensetotal=$expenses->sum("amount");
                $edetails = DB::table('expense_details')
                ->join('expenseheads','expenseheads.id','=','expense_details.expense_head')
                ->select('expense_details.*','expenseheads.name as expense_name')
                ->get();
    
                $dexpenses = DailyExpenseModel::with(['project','staff'])->whereDate('date','<=',$end->format('y-m-d'))
                ->whereDate('date','>=',$start->format('y-m-d'))->where('brid', $brid)->orderBy('date','desc')->get();
                $ddetails = DailyExpenseModelDetails::with(['unit','types'])->get();
                $dexpensetotal=$dexpenses->sum("grand_total");
    
                //dd($dexpenses);
                $cashrecieve = DB::table('receive_vouchers')
                ->leftJoin('receive_details','receive_details.voucher_no','=','receive_vouchers.voucher_no')
                ->where('receive_details.brid', $brid)
                ->where('receive_details.receive_to','=','LE_5')
                ->whereDate('receive_vouchers.date','<=',$end->format('y-m-d'))
                ->whereDate('receive_vouchers.date','>=',$start->format('y-m-d'))
                ->sum("receive_details.amount");
                // dd($cashrecieve);
                $cashpayment = DB::table('payment_vauchers')
                ->leftJoin('payment_details','payment_details.voucher_no','=','payment_vauchers.voucher_no')
                ->where('payment_details.brid', $brid)
                ->where('payment_details.payment_source','=','LE_5')
                ->whereDate('payment_vauchers.date','<=',$end->format('y-m-d'))
                ->whereDate('payment_vauchers.date','>=',$start->format('y-m-d'))
                ->sum("payment_details.amount");
               
                $noncashrecieve = DB::table('receive_vouchers')
                ->leftJoin('receive_details','receive_details.voucher_no','=','receive_vouchers.voucher_no')
                ->where('receive_details.brid', $brid)
                ->where('receive_details.receive_to','!=','LE_5')
                ->whereDate('receive_vouchers.date','<=',$end->format('y-m-d'))
                ->whereDate('receive_vouchers.date','>=',$start->format('y-m-d'))
                ->sum("receive_details.amount");
                $noncashpayment = DB::table('payment_vauchers')
                ->leftJoin('payment_details','payment_details.voucher_no','=','payment_vauchers.voucher_no')
                ->where('payment_details.brid', $brid)
                ->where('payment_details.payment_source','!=','LE_5')
                ->whereDate('payment_vauchers.date','<=',$end->format('y-m-d'))
                ->whereDate('payment_vauchers.date','>=',$start->format('y-m-d'))
                ->sum("payment_details.amount");
            }
           
            $branches = Branch::get();
            $recivedpaytotal=($salestotal+$journaltotal+ $cashrecieve);
            $paymantpaytotal=($purchasetotal+$cashpayment+ $dexpensetotal);
        $totalbalance=($salestotal+$journaltotal+ $receivetotal) - ($purchasetotal+$paymenttotal+ $dexpensetotal);
        //dd($totalbalance);
        return view('main.admin.report.rep_daicashst',compact('recivedpaytotal','paymantpaytotal','revdetails','paydetails','purdetails','sadetails','dexpenses','ddetails','edetails','dexpensetotal','sales','journals','receives','purchases','payments','expenses','cashrecieve','cashpayment','noncashrecieve','noncashpayment','purchasetotal','salestotal','receivetotal','journaltotal','expensetotal','totalbalance','paymenttotal','start','end','br','branches'));
    }

   
}


