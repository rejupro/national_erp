<?php

namespace App\Http\Controllers\DailyProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Mobileaccount;
use App\ExpenseVaucher;
use App\Procontractor;
use App\ExpenseVaucherDetails;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Employee;
use App\Expensehead;
use Redirect;
use Auth;
use DB;
use Validator;

class ExpenseController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
           $expenses = ExpenseVaucher::with(['project'])->orderBy('created_at','desc')->get();
        
                $details = DB::table('expense_details')
                ->join('expenseheads','expenseheads.id','=','expense_details.expense_head')
                ->select('expense_details.*','expenseheads.name as expense_name')
                ->get();

           
        
        }else{
            $expenses = ExpenseVaucher::with(['project'])->where('bid',Auth::User()->brand_id)->get();
            $details = DB::table('expense_details')
            ->join('expenseheads','expenseheads.id','=','expense_details.expense_head')
            ->select('expense_details.*','expenseheads.name as expense_name')
            ->get();

        }
        return view('main.admin.dailyprocess.expenses_list',compact('expenses','details'));
    }

    public function create()
    {
        $other_creadits = Currency::get();//for payment Source
        $pay_track = 'EXP-VNO-' . ExpenseVaucher::get()->max('id');
        
        // dd($bankAccount->toArray());
        if(Auth::User()->brand_id==1){
          $projects = Project::get();
          $employees = Employee::get();
          $types = Protype::get();
          $contractor = Procontractor::get();
          $mobile = Mobileaccount::orderBy('created_at','desc')->get();
          $bankAccount = DB::table('bankaccounts')
                ->leftJoin('banks','banks.id','=','bankaccounts.bid')
                ->select('bankaccounts.*','banks.name')
                ->get();
        }else{
            $projects = Project::where('brid',Auth::User()->brand_id)->get();
            $employees = Employee::where('wbrid',Auth::User()->brand_id)->get();
            $contractor = Procontractor::where('brid',Auth::User()->brand_id)->get();
            $types = Protype::where('brid',Auth::User()->brand_id)->get();
            $mobile = Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
            $bankAccount = DB::table('bankaccounts')
                ->leftJoin('banks','banks.id','=','bankaccounts.bid')
                ->select('bankaccounts.*','banks.name')
                ->where('bankaccounts.brid',Auth::User()->brand_id)
                ->get();
        }
        $expensehead =Expensehead::get();
        // dd($suppliers->toArray());
        

        return view('main.admin.dailyprocess.expenses_create',compact('other_creadits','projects','expensehead','types','bankAccount','mobile','pay_track','employees','contractor'));
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
        //    dd([
        //     'voucher_no' =>  $request->voucher_no,
        //     'project_id' =>  $request->project_id,
        //     'amount' =>  $request->total,
        //     'stf_id' =>  $request->stf_id,
        //     'date' =>  date('Y-m-d', strtotime($request->date)),
        //     'note' =>  $request->note,
        //     'uid' => $user_id,
        //     'bid' => $bid
        //    ]);
            $insert=DB::table('expense_vouchers')->insert([
                'voucher_no' =>  $request->voucher_no,
                'project_id' =>  $request->project_id,
                'amount' =>  $request->total,
                'stf_id' =>  $request->stf_id,
                'date' =>  date('Y-m-d', strtotime($request->date)),
                'note' =>  $request->note,
                'uid' => $user_id,
                'bid' => $bid
            ]);

            $insert_cash=DB::table('cashs')->insert([
                'inv_no' =>  $request->voucher_no,
                'status' =>  'EXP',
                'amount' =>  $request->total,
                'credit' =>  $request->total,
                'uid' => $user_id,
                'bid' => $bid
            ]);
        
        
            $rules = array(
            'other_credits.*'  => 'required',
            'expense_head.*'  => 'required',
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
            $other_credits = $request->other_credits;
            $expense_head = $request->expense_head;
            $type_id = $request->type_id;
            $amount = $request->amount;
            $ref = $request->ref;
            $cheque_no = $request->cheque_no;
            $cheque_date = $request->cheque_date;


            for($count = 0; $count < count($other_credits); $count++)
            {
            $data = array(
                'other_credits' => $other_credits[$count],
                'expense_head'  => $expense_head[$count],
                'voucher_no' =>$voucher_no,
                'cheque_no' => $cheque_no[$count],
                'cheque_date'  => $cheque_date[$count],
                'amount'  => $amount[$count],
                'ref'  => $ref[$count],
                'type_id' => $type_id[$count]
                
               
            );
            $insert_data[] = $data; 
            }

            ExpenseVaucherDetails::insert($insert_data);
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
        
            DB::table('expense_vouchers')->where('voucher_no', $id)->delete();
            DB::table('cashs')->where('inv_no', $id)->delete();
            DB::table('expense_details')->where('voucher_no', $id)->delete();
        return redirect(route('expense-list'))->with('success', 'Expense Delete Successfully...!!!');
    }

    public function view($id)
    {
        $data = DB::table('expense_vouchers')->where('voucher_no', $id)->first();
        $project = DB::table('projects')->where('id', $data->project_id)->first();
        $staff = DB::table('employees')->where('id', $data->stf_id)->first();
        
        $details = DB::table('expense_details')
        ->join('expenseheads','expenseheads.id','=','expense_details.expense_head')
        ->select('expense_details.*','expenseheads.name as expense_name')
        ->where('voucher_no', $id)->get();
        if(Auth::User()->brand_id==1){
            $list = DB::table('expense_vouchers')->get();
          }else{
            $list = DB::table('expense_vouchers')->where('bid',Auth::User()->brand_id)->get();
          }
       
        return view('main.admin.dailyprocess.expense_voucher_view',compact('data','list','details','project','staff'));
    }
}
