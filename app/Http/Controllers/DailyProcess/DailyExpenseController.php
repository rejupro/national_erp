<?php

namespace App\Http\Controllers\DailyProcess;

use App\DailyExpenseModel;
use App\DailyExpenseModelDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Designation;
use App\Employee;
use App\Procontractor;

use App\Product;
use App\Project;
use App\Requisition;
use App\Expensehead;
use App\PaymentVaucher;
use App\Unit;
use App\Protype;

use DB;
use Validator;
use Carbon\Carbon;
use Auth;

class DailyExpenseController extends Controller
{
    public function index()
    {
        if(Auth::User()->brand_id==1){
           $expenses = DailyExpenseModel::with(['project','staff'])->orderBy('date','desc')->get();
           $details = DailyExpenseModelDetails::with(['unit','types'])->get();
          
       
        }else{
            $expenses = DailyExpenseModel::with(['project','staff'])->orderBy('date','desc')->where('brid',Auth::User()->brand_id)->get();
            $details = DailyExpenseModelDetails::with(['unit','types'])->get();
        }
        return view('main.admin.dailyprocess.daily_expense_list',compact('expenses','details'));
    }
    public function create()
    {
        if(Auth::User()->brand_id==1){
            $projects = Project::get();
            $employees = Employee::get();
            $contractor = Procontractor::get();
            $expenses = Expensehead::get();
            $products = Product::get();
            $unit = Unit::get();
            $pay_vaucher = PaymentVaucher::get();
            $types = Protype::get();
        }else{
            $projects = Project::where('brid',Auth::User()->brand_id)->get();
            $employees = Employee::where('wbrid',Auth::User()->brand_id)->get();
            $contractor = Procontractor::where('brid',Auth::User()->brand_id)->get();
            $expenses = Expensehead::where('brid',Auth::User()->brand_id)->get();
            $products = Product::where('brid',Auth::User()->brand_id)->get();
            $unit = Unit::get();
            $pay_vaucher = PaymentVaucher::where('bid',Auth::User()->brand_id)->get();
            $types = Protype::where('brid',Auth::User()->brand_id)->get();
   
        }
        $code = 'DEXP-NO-' . DailyExpenseModel::get()->max('id');
        return view('main.admin.dailyprocess.daily_expense_create',compact('pay_vaucher','projects','employees','products','unit','code','expenses','types','contractor'));
    }
    public function store(Request $request)
    {
        try {
       
        if($request->ajax())
        {
            $rules = array(
                //'project_id' => 'required',
                'requisition_item.*'  => 'required',
                'price.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            $user_id=Auth::User()->id;
            $bid=Auth::User()->brand_id;


            $insert=DailyExpenseModel::create([
                'voucher_no' =>  $request->voucher_no,
                'project_id' =>  $request->project_id,
                'date' =>  date('Y-m-d', strtotime($request->date)),
                'stf_id' =>  $request->stf_id ? $request->stf_id: null,
                'address' =>  $request->address,
                'grand_total' =>  $request->total,
                'uid' => $user_id,
                'brid' => $bid
            ]);

            
            $daily_expense_model_id =$insert->id;
            $requisition_item = $request->requisition_item;
            $unit_id = $request->unit_id;
            $type = $request->type_id;
            $qty = $request->qty;
            $price = $request->price;
            $nprice = $request->nprice;
            for($count = 0; $count < count($requisition_item); $count++)
            {
            $data = array(
                'requisition_item' => $requisition_item[$count],
                'unit_id'  => $unit_id[$count],
                'qty' => $qty[$count],
                'price'  => $price[$count],
                'nprice'  => $nprice[$count],
                'stf_id'  => $request->stf_id ? $request->stf_id: null,
                'type'  => $type[$count],
                'daily_expense_model_id' => $daily_expense_model_id
            );
            $insert_data[] = $data;
            }
            DailyExpenseModelDetails::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
            }
            return redirect(route('daily-expense-create-route'));
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }
    // public function view($id)
    // {
    //     $expenses = DailyExpenseModel::with(['project','staff'])->get();
    //     $details = DailyExpenseModelDetails::with('unit')->where('daily_expense_model_id', '=', $id)->get();
    //     $list = DB::table('daily_expense_models')->get();
    //     // dd( $details->toArray());
    //     return view('main.admin.dailyprocess.daily_expense_view',compact('expenses','details','list'));
    // }


    public function view($id)
    {
        $data = DailyExpenseModel::where('voucher_no', '=', $id)->with(['project','staff'])->first();
        $ids=$data->id;
       // dd($data);
        $details = DailyExpenseModelDetails::with(['unit','types'])->where('daily_expense_model_id', '=', $ids)->get();
        $list = DB::table('daily_expense_models')->get();
       
        return view('main.admin.dailyprocess.daily_expense_view',compact('data','list','details'));
    }

    public function destroy($id)
    {
        
            DB::table('daily_expense_models')->where('id', $id)->delete();
            DB::table('daily_expense_model_details')->where('daily_expense_model_id', $id)->delete();
        return redirect(route('daily-expense-list'))->with('success', 'Data Delete Successfully...!!!');
    }
    public function getAmount($id)
    {
        $data = PaymentVaucher::where('id',$id)->first();
        // dd($data->toArray());
        return response()->json($data);
    }
}
