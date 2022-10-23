<?php

namespace App\Http\Controllers\lc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Validator;
use App\Pi;
use App\Pi_item;
use App\Lc;
use App\Bank;
use Redirect;
use Auth;
use DB;

class lcController extends Controller
{


   public function lc_create()
   {
        $pi = Pi::with(['supplier','buyer'])->get();
        $bank = Bank::get();
        $lc_track = 'LC-NO-' . Lc::get()->max('id');
        return view('main.admin.lc_setup.lc_setup',compact('pi','bank','lc_track'));
   }
   public function lc_store(Request $request)
   {
       $request->validate([
           'lc_no'   => 'required',
           'pi_code'   => 'required',
           'b_name'   => 'required',
           's_name'   => 'required',
           'ship_date'   => 'required',
           'exp_date'   => 'required',
           'local_bank'   => 'required',
           't_amount'   => 'required'
          
       ]);
       $user_id=Auth::User()->id;

       $insert=DB::table('lcs')->insert([
                'lc_no' =>  $request->lc_no,
                'pi_code' =>  $request->pi_code,
                'b_name' =>  $request->b_name,
                's_name' =>  $request->s_name,
                'ship_date' =>  $request->ship_date,
                'exp_date' =>  $request->exp_date,
                'local_bank' =>  $request->local_bank,
                'bene_bank' =>  $request->bene_bank,
                'note' =>  $request->note,
                't_amount' =>  $request->t_amount,
                'u_id' =>  $user_id
        
            ]);

            return Redirect::route('list-lc-setup')->with(['success', 'LC Added Successfully...!!!']);

       
   }
   

   public function lc_list()
   {

        $lc = Lc::get();
        return view('main.admin.lc_setup.lc_list',compact('lc'));
   }

      public function destroy($id)
        {
            DB::table('lcs')->where('id', $id)->delete();
            return redirect(route('list-lc-setup'))->with('success', 'Data Deleted Successfully');
        }

  

        public function getDetails($id)
        {
            $data = Pi::where('pi_code',$id)->with(['supplier','buyer'])->first();
         
            return response()->json($data);
        }

        public function show($id)
        {
            $lc = Lc::findOrFail($id);
            // dd($lc->toArray());
           return view('main.admin.lc_setup.lc_view',compact('lc'));
        }



//    public function port_setup()
//    {
//        return view('main.admin.lc_setup.port_setup');
//    }

//    public function cost_type()
//    {
//        return view('main.admin.lc_setup.cost_type');
//    }

  
}
