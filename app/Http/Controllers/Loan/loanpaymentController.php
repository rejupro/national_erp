<?php

namespace App\Http\Controllers\Loan;

use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Mobileaccount;
use App\PaymentVaucher;
use App\Paymentdetail;
use App\Customer;
use App\Procontructor;
use App\Employee;
use App\Cash;
use App\Project;
use App\Protype;
use App\Loaninvoice;
use App\Supplier;
use App\Loan;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use Validator;



class loanpaymentController extends Controller
{
    public function create()
    {
        
        $pay_track = 'PAY-VNO-' . PaymentVaucher::get()->max('id');
        if(Auth::User()->brand_id==1){
            $mobile = Mobileaccount::orderBy('created_at','desc')->get();
        }else{
            $mobile = Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
            $bankAccount = Bankaccount::with(['bank'])->get();
        }else{
            $bankAccount = Bankaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->with(['bank'])->get();
        }
        if(Auth::User()->brand_id==1){
            $types = Protype::get();
        }else{
            $types = Protype::where('brid',Auth::User()->brand_id)->get();
        }

       

        if(Auth::User()->brand_id==1){
            $projects = Project::get();
          }else{
              $projects = Project::where('brid',Auth::User()->brand_id)->get();
          }

        if(Auth::User()->brand_id==1){
            $loan= Loan::get();
        }else{
            $loan= Loan::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }

     
       

        if(Auth::User()->brand_id==1){
            $loaninvoice= Loaninvoice::get();
        }else{
            $loaninvoice= Loaninvoice::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        return view('main.admin.loan.loan_payment',compact('projects','types','bankAccount','mobile','pay_track','loaninvoice','loan'));
        
    }

    public function store(Request $request)
    {

        

        if($request->ajax())
        {
            $request->validate([
                'voucher_no'=> 'required',
                'total' => 'required',
                'date' => 'required',
                'loan_id' => 'required'
            ]);
            if($request->loan_id) {
                $loan = Loan::where('code', $request->loan_id)->first();
                $loan_total = ($loan->credit + $request->total);
                $bal_update['credit'] = $loan_total;
                $update = Loan::where('code', $request->loan_id)->update($bal_update);
            }
           
            $user_id=Auth::User()->id;
            $bid=Auth::User()->brand_id;
           
            $insert=DB::table('payment_vauchers')->insert([
                'voucher_no' =>  $request->voucher_no,
                'project_id' =>  $request->project_id,
                'amount' =>  $request->total,
                'date' =>  $request->date,
                'note' =>  $request->note,
                'r_id' =>  $request->r_id,
                'uid' => $user_id,
                'bid' => $bid
            ]);

            $insert_cash=DB::table('cashs')->insert([
                'inv_no' =>  $request->voucher_no,
                'status' =>  'PAY',
                'amount' =>  $request->total,
                'credit' =>  $request->total,
                'uid' => $user_id,
                'bid' => $bid
            ]);
        
        
            $rules = array(
            'payment_source.*'  => 'required',
            'payment_to.*'  => 'required',
            'amount.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
            }
            $voucher_no = $request->voucher_no;
            $payment_source = $request->payment_source;
            $payment_to = $request->payment_to;
            $type_id = $request->type_id;
            $amount = $request->amount;
            $ref = $request->ref;
            $cheque_no = $request->cheque_no;
            $cheque_date = $request->cheque_date;


            for($count = 0; $count < count($payment_source); $count++)
            {
            $data = array(
                'payment_source' => $payment_source[$count],
                'payment_to'  => $payment_to[$count],
                'voucher_no' =>$voucher_no,
                'cheque_no' => $cheque_no[$count],
                'cheque_date'  => $cheque_date[$count],
                'amount'  => $amount[$count],
                'ref'  => $ref[$count],
                'type_id' => $type_id[$count],
                'brid' => $bid
                
               
            );
            $insert_data[] = $data; 
            }

            Paymentdetail::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
            }
    }

    public function getDetails($id)
    {
        $data = Loaninvoice::where('inv_no',$id)->first();
     
        return response()->json($data);
    }
}
