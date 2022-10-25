<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Rawmaterial;
use DB;

class RawProductController extends Controller
{
    public function rawproduct_create(){
        $products = Product::latest()->get();
        $rawmaterial = Rawmaterial::latest()->get();
        return view('main.admin.rawmaterial.rawproduct.rawproduct_create', compact('products', 'rawmaterial'));
    }



    // Raw Product Store
    public function rawproduct_store(Request $request){
        $validated = $request->validate([
            'give_type' => 'required',
            'total_readyproduct' => 'required'
        ]);
        $i = 0;
        for ($i; $i < 2; $i++):
            $array[] = [
                'product_id' => $request->product_id[$i],
                'give_type' => $request->give_type[$i]
            ];
        endfor;
        return response()->json([
            'message' => 'Thanks You',
            'data' => $array,
        ]);
    }
}
