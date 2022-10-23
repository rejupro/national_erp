<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Mobileaccount;
use App\Banktransaction;
use App\Banktransactiondetail;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Supplier;
use Redirect;
use Auth;
use DB;
use Validator;

class banktransactionController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
          $results = Banktransaction::with(['project'])->get();
        }else{
          $results = Banktransaction::with(['project'])->where('bid',Auth::User()->brand_id)->get();
        }
        return view('main.admin.bank.bank_trans_list',compact('results'));
    }

    public function create()
    {
        $other_creadits = Currency::get();//for payment Source
        $pay_track = 'BKT-VNO-' . Banktransaction::get()->max('id');
        $mobile = Mobileaccount::orderBy('created_at','desc')->get();
        $bankAccount = Bankaccount::with(['bank'])->get();
        $suppliers = Supplier::with('invoices')->whereHas('invoices', function($q){
            return $q->where('status', 0);
        })->get();

        return view('main.admin.bank.bank_trans_create',compact('other_creadits','suppliers','bankAccount','mobile','pay_track'));
    }
    public function store(Request $request)
    {
      
        if($request->ajax())
        {
        
            $request->validate([
                'trans_no'=> 'required',
                'total' => 'required',
                'date' => 'required'
            ]);
            $user_id=Auth::User()->id;
            $bid=Auth::User()->brand_id;
           
            $insert=DB::table('bank_transactions')->insert([
                'trans_no' =>  $request->trans_no,
                'amount' =>  $request->total,
                'date' =>  $request->date,
                'note' =>  $request->note,
                'uid' => $user_id,
                'bid' => $bid
            ]);

            $insert_cash=DB::table('cashs')->insert([
                'inv_no' =>  $request->trans_no,
                'status' =>  'BKT',
                'amount' =>  $request->total,
                'credit' =>  $request->total,
                'uid' => $user_id,
                'bid' => $bid
            ]);
        
        
            $rules = array(
            'deposit_to.*'  => 'required',
            'deposit_from.*'  => 'required',
            'amount.*'  => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
            }
            $trans_no = $request->trans_no;
            $deposit_to = $request->deposit_to;
            $deposit_from = $request->deposit_from;
            $amount = $request->amount;
            $ref = $request->ref;
            $cheque_no = $request->cheque_no;
            $cheque_date = $request->cheque_date;


            for($count = 0; $count < count($deposit_to); $count++)
            {
            $data = array(
                'deposit_to' => $deposit_to[$count],
                'deposit_from'  => $deposit_from[$count],
                'trans_no' =>$trans_no,
                'cheque_no' => $cheque_no[$count],
                'cheque_date'  => $cheque_date[$count],
                'amount'  => $amount[$count],
                'ref'  => $ref[$count],
                'brid' => $bid
                
               
            );
            $insert_data[] = $data; 
            }

            Banktransactiondetail::insert($insert_data);
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
        
            DB::table('bank_transactions')->where('trans_no', $id)->delete();
            DB::table('cashs')->where('inv_no', $id)->delete();
            DB::table('banktrans_details')->where('trans_no', $id)->delete();
        return redirect(route('banktransaction-list'))->with('success','Deleted successfully');
    }

    public function view($id)
    {
        $data = DB::table('bank_transactions')->where('trans_no', $id)->first();
        $details = DB::table('banktrans_details')->where('trans_no', $id)->get();


        if(Auth::User()->brand_id==1){ 
            $list = DB::table('bank_transactions')->get();
          }else{
            $list = DB::table('bank_transactions')->where('bid',Auth::User()->brand_id)->get();
          }
        return view('main.admin.bank.bank_trans_view',compact('data','list','details'));
    }
}
