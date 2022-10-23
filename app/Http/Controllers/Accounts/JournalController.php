<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\JournalVoucher;
use App\JournalVoucherDetail;
use App\Ledger;
use App\Project;
use App\SubGroup;
use App\Bank;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Bankaccount;
use App\Mobileaccount;
use Redirect;

class JournalController extends Controller
{
    public function index()
    {

        if(Auth::User()->brand_id==1){ 
            $journal = JournalVoucher::with(['project'])->get();
          }else{
            $journal = JournalVoucher::with(['project'])->where('brid',Auth::User()->brand_id)->get();
          }
      
        
        return view('main.admin.accounts.jour_list',compact('journal'));
    }
    public function create()
    {
        if(Auth::User()->brand_id==1){
            $projects = Project::get();
            
          }else{
              $projects = Project::where('brid',Auth::User()->brand_id)->get();
             
        }
        $banks = Bank::get();
        $sub_groups = SubGroup::get();
        $ledgers = Ledger::get();
        $jur_track = 'JUR-VNO-' . JournalVoucherDetail::get()->max('id');
        return view('main.admin.accounts.jour_create',compact('projects','sub_groups','ledgers','jur_track','banks'));
    }
    public function store(Request $request)
    {

        // dd($request->all());
        $user_id=Auth::User()->id;
        $brid=Auth::User()->brand_id;
        $data = $request->except('_token', 'debit_sub_group_id', 'debit_ledger_id', 'debit_amount', 'credit_ledger_id', 'credit_sub_group_id','cheque_no','cheque_date','ref');
        $data['uid']=$user_id;
        $data['brid']=$brid;
        $result = JournalVoucher::create($data);
        // dd($request->debit_sub_group_id);

        foreach($request->debit_sub_group_id as $key => $value):
            $details[] = [
                'journal_voucher_id' => $result->id,
                'debit_ledger_id' => $request->debit_ledger_id[$key],
                'debit_sub_group_id' => $request->debit_sub_group_id[$key],
                'debit_amount' => $request->debit_amount[$key],
                'credit_ledger_id' => $request->credit_ledger_id[$key],
                'credit_sub_group_id' => $request->credit_sub_group_id[$key],
                'cheque_no' => $request->cheque_no[$key],
                'cheque_date' => $request->cheque_date[$key],
                'ref' => $request->ref[$key],
                'brid'=> $brid
            ];
        endforeach;

        // dd($request->all(),$details);
        JournalVoucherDetail::insert($details);
        return redirect(route('journal-list'))->with('success', 'Data Added Successfully...!!!');

    }

    public function show($id)
    {
        $data = DB::table('journal_vouchers')->where('id', $id)->first();
        $project = DB::table('projects')->where('id', $data->project_id)->first();
        
        $details = DB::table('journal_voucher_details')
        ->where('journal_voucher_id',$id)->get();
       // dd($details);
        
        if(Auth::User()->brand_id==1){ 
            $list = DB::table('journal_vouchers')->get();
          }else{
            $list = DB::table('journal_vouchers')->where('brid',Auth::User()->brand_id)->get();
          }
          return view('main.admin.accounts.jour_view',compact('data','list','details','project'));

    }

    public function destroy($id)
    {
        DB::table('journal_vouchers')->where('id', $id)->delete();
        DB::table('journal_voucher_details')->where('journal_voucher_id', $id)->delete();
        return redirect(route('journal-list'))->with('success', 'Data Deleted Successfully...!!!');
    }

    public function find_debit_ledger(Request $request)
    {
        $id= $request->sub_grp_id;
        if($id==7){
            
            $ledger=Bankaccount::where('brid',Auth::User()->brand_id)->with(['bank'])->orderBy('created_at','desc')->get();
            $str = '';
            $str = '<option value=""> -Select- </option>';
            if ($ledger){
                foreach($ledger as $result){
                    $str .='<option value="BA_'.$result->id.'"> '.$result->bank->name.'-'.$result->acc_no.' </option>';
                }
                
            }

        }elseif($id==9){
            $ledger=Mobileaccount::where('brid',Auth::User()->brand_id)->orderBy('created_at','desc')->get();
            $str = '';
            $str = '<option value=""> -Select- </option>';
            if ($ledger){
                foreach($ledger as $result){
                    $str .='<option value="MA_'.$result->id.'"> '.$result->mname.'-'.$result->number.' </option>';
                }
                
            }

        }elseif($id==21){
            $ledger=DB::table('products')->get();
            $str = '';
            $str = '<option value=""> -Select- </option>';
            if ($ledger){
                foreach($ledger as $result){
                    $str .='<option value="PO_'.$result->id.'"> '.$result->code.'-'.$result->name.' </option>';
                }
                
            }

        }elseif($id==2){
            $ledger=DB::table('suppliers')->get();
            $str = '';
            $str = '<option value=""> -Select- </option>';
            if ($ledger){
                foreach($ledger as $result){
                    $str .='<option value="SU_'.$result->id.'"> '.$result->code.'-'.$result->name.' </option>';
                }
                
            }

        }elseif($id==3){
            $ledger=DB::table('customers')->get();
            $str = '';
            $str = '<option value=""> -Select- </option>';
            if ($ledger){
                foreach($ledger as $result){
                    $str .='<option value="CU_'.$result->id.'"> '.$result->code.'-'.$result->name.' </option>';
                }
                
            }

        }else{
            $ledger=DB::table('ledgers')->where('sub_grp_id', "$id")->get();
            $str = '';
            $str = '<option value=""> -Select- </option>';
            if ($ledger){
                foreach($ledger as $result){
                    $str .='<option value="LD_'.$result->id.'"> '.$result->name.' </option>';
                }
                
            }

        }
        return $str;

       
    }
}
