<?php

namespace App\Http\Controllers\Requisition;

use App\Designation;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Product;
use App\Project;
use App\Requisition;
use App\Expensehead;
use App\RequisitionDetails;
use App\Returnrequisitionns;
use App\Returnrequisitiondetails;
use App\Unit;
use Illuminate\Http\Request;
use DB;
use Validator;
use Carbon\Carbon;
use Auth;

class RequisitionController extends Controller
{
    public function index()
    {   
        if(Auth::User()->brand_id==1){
         $requisition = Requisition::with('details','project','staff')->orderBy('created_at','desc')->get();
        }else{
            $requisition = Requisition::where('brid',Auth::User()->brand_id)->with('details','project','staff')->orderBy('created_at','desc')->get();
        }
        // dd($requisition->toArray());
        $daterequisition='';
        return view('main.admin.requisition.requisition_list',compact('requisition','daterequisition'));
    }

    public function requisition_approve()
    {
        if(Auth::User()->brand_id==1){
            $requisition = Requisition::where('status','Approve')->with('details','project','staff')->orderBy('created_at','desc')->get();
           }else{
            $requisition = Requisition::where('brid',Auth::User()->brand_id)->where('status','Approve')->with('details','project','staff')->orderBy('created_at','desc')->get();
           }
      
        return view('main.admin.requisition.requisition_approve_list',compact('requisition'));
    }

    public function requisition_pending()
    {
        if(Auth::User()->brand_id==1){
            $requisition = Requisition::where('status','Pending')->with('details','project','staff')->orderBy('created_at','desc')->get();
           }else{
            $requisition = Requisition::where('brid',Auth::User()->brand_id)->where('status','Pending')->with('details','project','staff')->orderBy('created_at','desc')->get();
           }
        return view('main.admin.requisition.requisition_pending_list',compact('requisition'));
    }

    public function create()
    {
        $code = 'REQ-NO-' . Requisition::get()->max('id');
        $designations = Designation::get();
        if(Auth::User()->brand_id==1){
            $projects = Project::get();
            $employees = Employee::get();
            $expenses = Expensehead::get();
           
            $products = Product::get();
            $unit = Unit::get();
        }else{
            $projects = Project::where('brid',Auth::User()->brand_id)->get();
            $employees = Employee::where('wbrid',Auth::User()->brand_id)->get();
            $expenses = Expensehead::where('brid',Auth::User()->brand_id)->get();
            $products = Product::where('brid',Auth::User()->brand_id)->get();
            $unit = Unit::get();

        }
        // dd($expense->toArray());
        return view('main.admin.requisition.requisition_create',
        compact('projects','employees','designations','products','unit','code','expenses'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->ajax())
        {
            $request->validate([
                'project_id'=> 'required',
                'code' => 'required',
                'cnumber' => 'required',
                'stf_id' => 'required'
            ]);
            $uid=Auth::User()->id;
            $brid=Auth::User()->brand_id;


            $insert=Requisition::create([
                'project_id' =>  $request->project_id,
                'status' =>  $request->status,
                'code' =>  $request->code,
                'stf_id' =>  $request->stf_id,
                'dsgn_id' =>  $request->dsgn_id,
                'cnumber' =>  $request->cnumber,
                'cemail' =>  $request->cemail,
                'address' =>  $request->address,
                'grand_total' =>  $request->total,
                'uid' =>  $uid,
                'brid' =>  $brid,
            ]);

            $rules = array(
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
            $requisition_id =$request->code;
            $requisition_item = $request->requisition_item;
            $unit_id = $request->unit_id;
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
                'requisition_id' => $requisition_id
            );
            $insert_data[] = $data;
            }
            // dd($insert_data);
            RequisitionDetails::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
            }
        return redirect(route('requisition-create-route'));
    }

    public function edit($id)
    {
        // dd($id);
        $designations = Designation::get();
        if(Auth::User()->brand_id==1){
            $projects = Project::get();
            $employees = Employee::get();
            $expenses = Expensehead::get();
           
            $products = Product::get();
            $unit = Unit::get();
        }else{
            $projects = Project::where('brid',Auth::User()->brand_id)->get();
            $employees = Employee::where('wbrid',Auth::User()->brand_id)->get();
            $expenses = Expensehead::where('brid',Auth::User()->brand_id)->get();
            $products = Product::where('brid',Auth::User()->brand_id)->get();
            $unit = Unit::get();

        }
        $requisition=Requisition::where('code',$id)->first();
        $details = RequisitionDetails::where('requisition_id', $id)->get();
        return view('main.admin.requisition.requisition_edit',compact('projects','expenses','employees','designations','products','unit','requisition', 'details'));
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());

        $insert=DB::table('requisitions')->where('id',$id)->update([
            'project_id' =>  $request->project_id,
            'status' =>  $request->status,
            'code' =>  $request->code,
            'stf_id' =>  $request->stf_id,
            'dsgn_id' =>  $request->dsgn_id,
            'cnumber' =>  $request->cnumber,
            'cemail' =>  $request->cemail,
            'address' =>  $request->address,
            'grand_total' =>  $request->total
        ]);
       
        foreach($request->requisition_item as $count => $i):
            $update=DB::table('requisition_details')->where('requisition_id',$request->code)->update([
                'requisition_id' => $request->code,
                'requisition_item' => $request->requisition_item[$count],
                'unit_id'  => $request->unit_id[$count],
                'qty' => $request->qty[$count],
                'price'  => $request->price[$count],
                'nprice'  => $request->nprice[$count]
            ]); 
        endforeach;
        return redirect(route('requisition-list-route'))->with('success', 'Data Updated Successfully');
    }

    

    public function return_index()
    {
        $requisition = Returnrequisitionns::with('project','staff')->orderBy('created_at','desc')->get();
       
        return view('main.admin.requisition.return_requisition_list',compact('requisition'));
    }

    public function return_page(Request $request)
    {
        $requisitionlist=Requisition::where('status','Approve')->orderBy('created_at','desc')->get();
        $projects = Project::get();
        $employees = Employee::get();
        $expenses = Expensehead::get();
        $designations = Designation::get();
        $products = Product::get();
        $unit = Unit::get();
        $requisition="";
        $details = "";
        return view('main.admin.requisition.return_requisition',compact('requisitionlist','projects','expenses','employees','designations','products','unit','requisition', 'details'));
    }

    public function return_create(Request $request)
    {
        $requisitionlist="";
        $id = $request->requisition_id;
        $projects = Project::get();
        $rcode = 'REQ-R-NO-' . Returnrequisitionns::get()->max('id');
        $employees = Employee::get();
        $expenses = Expensehead::get();
        $designations = Designation::get();
        $products = Product::get();
        $unit = Unit::get();
        $requisition=Requisition::where('code',$id)->first();
        $details = RequisitionDetails::where('requisition_id', $id)->get();
        return view('main.admin.requisition.return_requisition',compact('requisitionlist','projects','expenses','employees','designations','products','unit','requisition', 'details','rcode'));
    }

    public function return_store(Request $request)
    {
        //dd($request->all());
        if($request->stf_id) {
            $employee = Employee::where('id', $request->stf_id)->first();
            $employee_total = ($employee->debit + $request->total);
            $bal_update['debit'] = $employee_total;
            $bal_update['balance'] = $employee->balance-$request->total;
            $update = Employee::where('id', $employee->id)->update($bal_update);

            $balance = $employee->balance-$request->total;

            $insert=DB::table('employee_balance')->insert([
                'project_id' =>  $request->project_id,
                'req_id' =>  $request->requisition_id,
                'debit' =>  $request->total,
                'emp_id' =>  $request->stf_id,
                'balance' =>  $balance
            ]);
        }

        $insert=DB::table('return_requisitions')->insert([
            'requisition_id' =>  $request->requisition_id,
            'project_id' =>  $request->project_id,
            'status' =>  $request->status,
            'code' =>  $request->code,
            'stf_id' =>  $request->stf_id,
            'dsgn_id' =>  $request->dsgn_id,
            'cnumber' =>  $request->cnumber,
            'cemail' =>  $request->cemail,
            'address' =>  $request->address,
            'grand_total' =>  $request->total
        ]);
       
        foreach($request->requisition_item as $count => $i):
            $update=DB::table('return_requisition_details')->insert([
                'rereq_id' => $request->code,
                'requisition_item' => $request->requisition_item[$count],
                'unit_id'  => $request->unit_id[$count],
                'qty' => $request->qty[$count],
                'price'  => $request->price[$count],
                'nprice'  => $request->nprice[$count]
            ]); 
        endforeach;
        return redirect(route('returnrequisition-list-route'))->with('success', 'Data Insert Successfully...!!!');
    }
    

   

    
    public function show($id)
    {
        $requisition = Requisition::where('id',$id)->with('details','project','staff')->first();
        
        $details = RequisitionDetails::where('requisition_id',$requisition->id)->get();
       // dd($requisition);
        $list = DB::table('requisitions')->get();
        return view('main.admin.requisition.requisition_view',compact('requisition','details','list'));
    }
    public function return_show($id)
    {
        $returnrequisition = Returnrequisitionns::where('code',$id)->with('project','staff')->first();
        $returndetails = Returnrequisitiondetails::where('rereq_id',$id)->get();
        $list = DB::table('return_requisitions')->get();
        return view('main.admin.requisition.return_requisition_view',compact('returnrequisition','returndetails','list'));
    }


    public function statusapprove($id)
    {
        $requisition = Requisition::where('id', $id)->first();
        $status['status'] = 'Approve';
        $update = Requisition::where('id', $requisition->id)->update($status);
        return redirect(route('requisition-aprrovelist-route'))->withErrors(['Data Approve Successfully...!!!']);
    }
    public function statuscancel($id)
    {
        $requisition = Requisition::where('id', $id)->first();
        $status['status'] = 'Cancel';
        $update = Requisition::where('id', $requisition->id)->update($status);
        return redirect(route('requisition-aprrovelist-route'))->withErrors(['Data Cancel Successfully...!!!']);
    }

    public function destroy($id)
    {
        DB::table('requisitions')->where('code', $id)->delete();
        DB::table('requisition_details')->where('requisition_id', $id)->delete();
        return redirect(route('requisition-list-route'))->with('success', 'Data Delete Successfully...!!!');
    }

    public function return_destroy($id)
    {
        $data=DB::table('return_requisitions')->where('code', $id)->first();
        DB::table('employee_balance')->where('req_id', $data->requisition_id)->delete();
        DB::table('return_requisitions')->where('code', $id)->delete();
        DB::table('return_requisition_details')->where('rereq_id', $id)->delete();
        return redirect(route('returnrequisition-list-route'))->with('success', 'Data Delete Successfully...!!!');
    }

    public function select_employee_phone(Request $request)
    {
        $data = Employee::where('id',$request->id)->first();
        echo $data->mobile;
    }

    public function balance_list()
    {
        $data = Employee::get();
        return view('main.admin.requisition.balance_list',compact('data'));
    }

    public function search_product_cost_by_id(Request $request)
    {
        $id = $request->id;
        $data = Product::where('id',$id)->first();
        $cost = $data->cost;
        echo $cost;
    }

    public function getDetails($id)
        {
            $data = Employee::where('id',$id)->with(['designation'])->first();
            
            return response()->json($data);
        }
        public function success()
        {
            return view('main.admin.requisition.requisition_success');
        }
        public function datefilter(Request $request)
            {
                $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                ]);

            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            $daterequisition = Requisition::whereDate('created_at','<=',$end->format('y-m-d'))
            ->whereDate('created_at','>=',$start->format('y-m-d'))->get();
            $requisition='';
           // dd($daterequisition);

            return view('main.admin.requisition.requisition_list',compact('daterequisition','requisition'));
            }
}
