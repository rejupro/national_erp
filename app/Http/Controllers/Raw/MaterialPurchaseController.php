<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rawmaterial;
use App\Rawmaterialcart;
use Auth;
use DB;

class MaterialPurchaseController extends Controller
{
    // Purchase Page Show
    public function purchase(){
        $products = Rawmaterial::latest()->get();
        return view('main.admin.rawmaterial.purchase.raw_purchase', compact('products'));
    }
    // Material Add to Cart
    public function rawtocart($id){

        $userid = Auth::user()->id;
        $dataExist = Rawmaterialcart::where('material_id', $id)->where('user_id', $userid)->get()->count();
        if($dataExist > 0){
            return response()->json([
                'message_error' => 'This product already in Cart',
            ]);
        }else{
            $insert = Rawmaterialcart::insert([
                'user_id' => $userid,
                'material_id' => $id,
            ]);
    
            if($insert){
                return response()->json([
                    'message' => 'Cart Added Successfully',
                ]);
            }else{
                return response()->json([
                    'message' => 'Not Added',
                ]);
            }
        }

    }
    // Matrial Show Cart
    public function rawcartdata(){
        $userid = Auth::user()->id;
        $datas = DB::table('raw_materialcarts')
        ->leftjoin('rawmaterials', 'raw_materialcarts.material_id', '=', 'rawmaterials.id')
        ->where('raw_materialcarts.user_id', '=', $userid)
        ->select('raw_materialcarts.*', 'rawmaterials.name as material_name')
        ->get();
        return response()->json([
            'data' => $datas
        ]);
    }
    // Material Cart Data Remove
    public function rawcartremove($id){
        $delete = Rawmaterialcart::where('id', $id)->delete();
        if($delete){
            return response()->json([
                'message' => 'Cart Removed Successfully',
            ]);
        }
    }

}
