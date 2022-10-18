<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rawmaterial;
use App\Rawmaterialcart;
use Auth;

class MaterialPurchaseController extends Controller
{
    public function purchase(){
        $products = Rawmaterial::latest()->get();
        return view('main.admin.rawmaterial.purchase.raw_purchase', compact('products'));
    }

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

}
