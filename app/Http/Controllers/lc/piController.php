<?php

namespace App\Http\Controllers\lc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use App\Supplier;
use App\Currency;
use App\Product;
use App\Pi;
use App\Pi_item;
use Redirect;
use Auth;
use DB;

class piController extends Controller
{
    public function pi_list(){
        $pi = Pi::with(['supplier','buyer'])->get();
       
        return view('main.admin.lc_setup.pi_list',compact('pi'));
    
      }  
    public function pi_create(){
        $supplier = Supplier::get();
        $currency = Currency::get();
        $product = Product::get();
        $pi_track = 'PI-NO-' . Pi::get()->max('id');
        return view('main.admin.lc_setup.pi_create',compact('supplier','currency','product','pi_track'));

    }  

    
    function insert(Request $request)
        {
        if($request->ajax())
        {
            $request->validate([
                'pi_code'=> 'required',
                'pi_date' => 'required',
                's_id' => 'required',
                'b_id' => 'required'
            ]);

            $insert=DB::table('pis')->insert([
                'pi_code' =>  $request->pi_code,
                'pi_date' =>  $request->pi_date,
                's_id' =>  $request->s_id,
                'b_id' =>  $request->b_id,
                'p_terms' =>  $request->p_terms,
                'issue_by' =>  $request->issue_by,
                'cur_type' =>  $request->cur_type,
                'note' =>  $request->note,
                'extra1' =>  $request->extra1
            ]);
        
            $rules = array(
            'item.*'  => 'required',
            'oty.*'  => 'required',
            'cost.*'  => 'required',
            'price.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
            }
            $pi_code = $request->pi_code;
            $item = $request->item;
            $oty = $request->oty;
            $cost = $request->cost;
            $price = $request->price;
            for($count = 0; $count < count($item); $count++)
            {
            $data = array(
                'item' => $item[$count],
                'oty'  => $oty[$count],
                'cost' => $cost[$count],
                'price'  => $price[$count],
                'pi_code' => $pi_code 
            );
            $insert_data[] = $data; 
            }

            Pi_item::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
            }


            
        }
        public function destroy($id)
        {
            DB::table('pis')->where('pi_code', $id)->delete();
            DB::table('pi_items')->where('pi_code', $id)->delete();
            return redirect(route('lc-list-pi'))->with('success', 'Data Deleted successfully');
        }

        public function getDetails1($id)
        {
            $data = Product::where('id',$id)->first();
           
            return response()->json($data);
        }


        public function show($id)
        {
            $pi = Pi::with(['supplier','buyer'])->findOrFail($id);
            $results = Pi_item::where('pi_code','=',$pi->pi_code)->get();
            // dd($pi->toArray());
            return view('main.admin.lc_setup.pi_view',compact('pi','results'));
        }
    



}
