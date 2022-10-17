<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Mobileaccount;
use App\Receivevoucher;
use App\Receivedetail;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Supplier;
use App\PaymentVaucher;
use App\Paymentdetail;
use App\JournalVoucher;
use App\JournalVoucherDetail;
use App\Ledger;
use Auth;
use DB;

class voucherreportController extends Controller
{
    public function payments(){

        if(Auth::User()->brand_id==1){
            // $results = PaymentVaucher::with(['project'])->get();
            $results = DB::table('payment_vauchers')
                        ->join('projects','projects.id','=','payment_vauchers.project_id')
                        ->get();
          }else{
            // $results = PaymentVaucher::where('bid',Auth::User()->brand_id)->with(['project'])->get(); 
            $results = DB::table('payment_vauchers')
                        ->join('projects','projects.id','=','payment_vauchers.project_id')
                        ->where('payment_vauchers.bid',Auth::User()->brand_id)
                        ->get();                    
          }
       // dd($results);
        return view('main.admin.report.rep_voupayments',compact('results'));
    }

    public function receipts(){
        if(Auth::User()->brand_id==1){
            // $results = Receivevoucher::with(['project'])->get();
            $results = DB::table('receive_vouchers')
                        ->join('projects','projects.id','=','receive_vouchers.project_id')
                        ->get();
          }else{
            // $results = Receivevoucher::where('bid',Auth::User()->brand_id)->with(['project'])->get();  
            $results = DB::table('receive_vouchers')
                        ->join('projects','projects.id','=','receive_vouchers.project_id')
                        ->where('receive_vouchers.bid',Auth::User()->brand_id)
                        ->get();                  
          }
       
        return view('main.admin.report.rep_voureceipts',compact('results'));
    }
    public function journal(){
        if(Auth::User()->brand_id==1){
            // $journal = JournalVoucherDetail::with(['journals.projects'])->get();
            $journal = DB::table('journal_vouchers')
                        ->join('projects','projects.id','=','journal_vouchers.project_id')
                        ->join('journal_voucher_details','journal_voucher_details.journal_voucher_id','=','journal_vouchers.id')
                        ->get();
          }else{
            // $journal = JournalVoucherDetail::where('brid',Auth::User()->brand_id)->with(['journals.projects'])->get();
            $journal = DB::table('journal_vouchers')
                        ->join('projects','projects.id','=','journal_vouchers.project_id')
                        ->join('journal_voucher_details','journal_voucher_details.journal_voucher_id','=','journal_vouchers.id')
                        ->where('journal_vouchers.brid',Auth::User()->brand_id)
                        ->get();                  
          }
       // dd($journal);
        return view('main.admin.report.rep_voujournal',compact('journal'));
    }
    public function payrevstate(){
        return view('main.admin.report.rep_voupayrevstate');
    }
    public function internaltrans(){
        return view('main.admin.report.rep_vouinternaltrans');
    }
    public function overview(){
        return view('main.admin.report.rep_vouoverview');
    }
}
