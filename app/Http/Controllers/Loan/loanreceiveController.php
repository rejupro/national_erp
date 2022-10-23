<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Mobileaccount;
use App\Receivevoucher;
use App\Receivedetail;
use App\Customer;
use App\Procontructor;
use App\Employee;
use App\Cash;
use App\Project;
use App\Protype;
use App\Loan;
use App\Loaninvoice;
use Redirect;
use Auth;
use DB;
use Validator;

class loanreceiveController extends Controller
{
    public function create()
    {
        
        $pay_track = 'RCV-VNO-' . Receivevoucher::get()->max('id');
        $mobile = Mobileaccount::orderBy('created_at','desc')->get();
        $bankAccount = Bankaccount::with(['bank'])->get();
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

     
        $types = Protype::get();
        if(Auth::User()->brand_id==1){
            $loaninvoice= Loaninvoice::get();
        }else{
            $loaninvoice= Loaninvoice::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        
        return view('main.admin.loan.loan_receive',compact('projects','types','bankAccount','mobile','pay_track','loaninvoice','loan'));
        
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
                $loan_total = ($loan->debit + $request->total);
                $bal_update['debit'] = $loan_total;
                $update = Loan::where('code', $request->loan_id)->update($bal_update);
            }
           
            $user_id=Auth::User()->id;
            $bid=Auth::User()->brand_id;
           
            $insert=DB::table('receive_vouchers')->insert([
                'voucher_no' =>  $request->voucher_no,
                'project_id' =>  $request->project_id,
                'amount' =>  $request->total,
                'date' =>  $request->date,
                'note' =>  $request->note,
                'uid' => $user_id,
                'bid' => $bid
            ]);

            $insert_cash=DB::table('cashs')->insert([
                'inv_no' =>  $request->voucher_no,
                'status' =>  'RCV',
                'amount' =>  $request->total,
                'debit' =>  $request->total,
                'uid' => $user_id,
                'bid' => $bid
            ]);
        
        
            $rules = array(
            'receive_to.*'  => 'required',
            'receive_from.*'  => 'required',
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
            $receive_to = $request->receive_to;
            $receive_from = $request->receive_from;
            $type_id = $request->type_id;
            $amount = $request->amount;
            $ref = $request->ref;
            $cheque_no = $request->cheque_no;
            $cheque_date = $request->cheque_date;


            for($count = 0; $count < count($receive_to); $count++)
            {
            $data = array(
                'receive_to' => $receive_to[$count],
                'receive_from'  => $receive_from[$count],
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

            Receivedetail::insert($insert_data);
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
