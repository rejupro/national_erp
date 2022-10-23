<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Mobileaccount;
use App\Receivevoucher;
use App\Receivedetail;
use App\Customer;
use App\Procontractor;
use App\Employee;
use App\Cash;
use App\Ledger;
use App\Project;
use App\Protype;
use App\Expensehead;
use App\Purchase_detail;
use App\Supplier;
use Redirect;
use Auth;
use DB;
use Validator;

class ReceiveVoucharController extends Controller
{
   

    public function index()
    {

        if(Auth::User()->brand_id==1){ 
            $results = Receivevoucher::with(['project'])->orderBy('date','desc')->get();
          }else{
            $results = Receivevoucher::where('bid',Auth::User()->brand_id)->with(['project'])->orderBy('date','desc')->get();
          }
       
        return view('main.admin.accounts.rev_voucher_list',compact('results'));
    }

    public function create()
    {
        $other_creadits = Currency::get();//for payment Source
        $pay_track = 'RCV-VNO-' . Receivevoucher::get()->max('id');
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
        };
        // dd($bankAccount->toArray());
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

        return view('main.admin.accounts.rev_voucher_create',compact('ledger','projects','suppliers','types','bankAccount','mobile','pay_track','customer','contructor','employee','expenses'));
    }
    public function store(Request $request)
    {
      
        if($request->ajax())
        {
        
            $request->validate([
                'voucher_no'=> 'required',
                'total' => 'required',
                'date' => 'required'
            ]);
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
        
            DB::table('receive_vouchers')->where('voucher_no', $id)->delete();
            DB::table('cashs')->where('inv_no', $id)->delete();
            DB::table('receive_details')->where('voucher_no', $id)->delete();
        return redirect(route('receivevoucher-list'))->with('success', 'Receive Voucher  Delete Successfully...!!!');
    }

    public function view($id)
    {
        $data = DB::table('receive_vouchers')->where('voucher_no', $id)->first();
        $project = DB::table('projects')->where('id', $data->project_id)->first();
        
        $details = DB::table('receive_details')
        ->where('voucher_no', $id)->get();
        
        foreach($details as $detail){
            $first = filter_var($detail->receive_from, FILTER_SANITIZE_NUMBER_INT);
            $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
            $second=filter_var($detail->receive_from, FILTER_SANITIZE_STRING);
            $type = preg_replace("/[^A-Za-z\-]/",'', $second);

           //dd($id);
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
            $list = DB::table('receive_vouchers')->get();
          }else{
            $list = DB::table('receive_vouchers')->where('bid',Auth::User()->brand_id)->get();
          }
        return view('main.admin.accounts.rev_voucher_view',compact('data','list','details','project'));
    }

}
