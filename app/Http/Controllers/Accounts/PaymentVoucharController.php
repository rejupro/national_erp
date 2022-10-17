<?php

namespace App\Http\Controllers\Accounts;

use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Mobileaccount;
use App\PaymentVaucher;
use App\Paymentdetail;
use App\JournalVoucherDetail;
use App\Receivedetail;
use App\Customer;
use App\Procontractor;
use App\Employee;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Supplier;
use App\Requisition;
use App\Expensehead;
use Illuminate\Http\Request;
use App\Ledger;
use Redirect;
use Auth;
use DB;
use Validator;

class PaymentVoucharController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){ 
          $results = PaymentVaucher::with(['project'])->orderBy('date','desc')->get();
        }else{
          $results = PaymentVaucher::where('bid',Auth::User()->brand_id)->with(['project'])->orderBy('date','desc')->get();
        }
        
        return view('main.admin.accounts.pay_voucher_list',compact('results'));
    }

    public function create()
    {
        $other_creadits = Currency::get();
        $requisition = Requisition::where('status','Approve')->get();//for payment Source
        $pay_track = 'PAY-VNO-' . PaymentVaucher::get()->max('id');
        if(Auth::User()->brand_id==1){
            $mobile = Mobileaccount::orderBy('created_at','desc')->get();
        }else{
            $mobile = Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
            $bankAccount = DB::table('bankaccounts')
                ->leftJoin('banks','banks.id','=','bankaccounts.bid')
                ->select('bankaccounts.*','banks.name')
                ->get();
        }else{
            $bankAccount = DB::table('bankaccounts')
                ->leftJoin('banks','banks.id','=','bankaccounts.bid')
                ->select('bankaccounts.*','banks.name')
                ->where('bankaccounts.brid',Auth::User()->brand_id)->orderBy('created_at','desc')
                ->get();
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
            $suppliers = Supplier::with('invoices')->whereHas('invoices', function($q){
                return $q->where('status', 0);
            })->get();
        }else{
            $suppliers = Supplier::where('brid',Auth::User()->brand_id)->with('invoices')->whereHas('invoices', function($q){
                return $q->where('status', 0);
            })->get();
        }


        if(Auth::User()->brand_id==1){
            $contructor = Procontractor::orderBy('created_at','desc')->get();
          }else{
              $contructor = Procontractor::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }
        if(Auth::User()->brand_id==1){
          $customer=Customer::get();
          $employee = Employee::get();
          $expenses = Expensehead::get();
        }else{
          $customer=Customer::where('brid',Auth::User()->brand_id)->get(); 
          $employee = Employee::where('wbrid',Auth::User()->brand_id)->get();
          $expenses = Expensehead::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
        }


        
        $ledger = Ledger::get();
//        dd($bankAccount);
        return view('main.admin.accounts.pay_voucher_create',compact('ledger','projects','suppliers','types','bankAccount','mobile','pay_track','customer','contructor','employee','requisition','expenses'));
    }
    public function store(Request $request)
    {

        if($request->r_id) {
            $requisition = Requisition::where('id', $request->r_id)->first();
            $employee = Employee::where('id', $requisition->stf_id)->first();
            $employee_total = ($employee->credit + $request->total);
            $bal_update['credit'] = $employee_total;
            $bal_update['balance'] = $employee->balance+$request->total;
            $update = Employee::where('id', $employee->id)->update($bal_update);

            $balance = $employee->balance-$request->total;
            $insert=DB::table('employee_balance')->insert([
                'project_id' =>  $request->project_id,
                'req_id' =>  $request->r_id,
                'pay_id' =>  $request->voucher_no,
                'credit' =>  $request->total,
                'emp_id' =>  $requisition->stf_id,
                'balance' =>  $balance
            ]);
        }
      
        if($request->ajax())
        {
        
            $request->validate([
                'voucher_no'=> 'required',
                'total' => 'required',
                'date' => 'required'
            ]);
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
    public function getSupplierInvoice($supplier_id)
    {
       $result= Supplier::with(['invoices'=>function($q){
            $q->where('status', 0);
       }])->whereHas('invoices', function($q){
            return $q->where('status', 0);
        })->findOrFail($supplier_id);
        // dd($result->toArray());
        // $result = $result->invoice
        $payable_amount= $result->invoices->sum('grand_total');
        // dd($payable_amount);
        return response()->json(compact('result','payable_amount'));
    }
    public function destroy($id)
    {
        $voucher = PaymentVaucher::where('id',$id)->first();
        // if($voucher->r_id > 0 ){
        //     $requisition = Requisition::where('id', $voucher->r_id)->first();
        //     $employee = Employee::where('id', $requisition->stf_id)->first();
        //     $employee_total = ($employee->credit - $voucher->amount);
        //     $bal_update['credit'] = $employee_total;
        //     $bal_update['balance'] = $employee->balance-$voucher->amount;
        //     $update = Employee::where('id', $employee->id)->update($bal_update);
        // }
       
       

            DB::table('payment_vauchers')->where('voucher_no', $id)->delete();
            DB::table('cashs')->where('inv_no', $id)->delete();
            DB::table('payment_details')->where('voucher_no', $id)->delete();
            DB::table('employee_balance')->where('pay_id', $id)->delete();
        return redirect(route('paymentvouchar-list'))->with('success', 'Payment Voucher  Delete Successfully...!!!');
    }

    public function view($id)
    {
        $data = DB::table('payment_vauchers')->where('voucher_no', $id)->first();
        $project = DB::table('projects')->where('id', $data->project_id)->first();
        
        $details = DB::table('payment_details')
        ->where('voucher_no', $id)->get();
        foreach($details as $detail){
            $first = filter_var($detail->payment_to, FILTER_SANITIZE_NUMBER_INT);
            $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
            $second=filter_var($detail->payment_to, FILTER_SANITIZE_STRING);
            $type = preg_replace("/[^A-Za-z\-]/",'', $second);
            //dd($type);
           if($type == 'SU'){
            $sname=DB::table('suppliers')->where('id', $id)->first();
              $name=$sname->name;
           }
           if($type == 'CO'){
            $sname=DB::table('procontractors')->where('id', $id)->first();
              $name=$sname->name;
           }
           if($type == 'EP'){
            $sname=DB::table('employees')->where('id', $id)->first();
           $name=$sname->name;
           }
           if($type == 'CU'){
            $sname=DB::table('customers')->where('id', $id)->first(); 
              $name=$sname->name;
           }
           if($type == 'LD'){
            $sname=DB::table('ledgers')->where('id', $id)->first(); 
              $name=$sname->name;
           }

        }
       

        if(Auth::User()->brand_id==1){ 
            $list = DB::table('payment_vauchers')->get();
          }else{
            $list = DB::table('payment_vauchers')->where('bid',Auth::User()->brand_id)->get();
          }

       

        return view('main.admin.accounts.pay_voucher_view',compact('data','list','details','project'));
    }

    public function countTotalCash(Request $request)
    {
       $id= $request->id;
       if($id=='LE_5'){
        $journalcash = JournalVoucherDetail::where('debit_ledger_id',7)->sum('debit_amount');
        $receivecash = Receivedetail::where('receive_to','LE_5')->sum('amount');
        $cash = $journalcash + $receivecash;
        echo $cash;
       }
    }


}
