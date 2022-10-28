<?php

namespace App\Http\Controllers\Raw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rawmaterial;
use App\RawMaterialcart;
use App\RawmaterialStock;
use File;

class RawMaterialController extends Controller
{
    // Data Store Page
    public function addraw(){
        return view('main.admin.rawmaterial.rawmaterial_add');
    }
    // Show Data
    public function index(){
        $datas = RawMaterial::orderBy('id','DESC')->get();
        return view('main.admin.rawmaterial.rawmaterial_list', compact('datas'));
    }
    // Data Store
    public function rawstore(Request $request){
        $validated = $request->validate([
            'code' => 'required|unique:rawmaterials',
            'name' => 'required',
            'image' => 'required|max:200',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Upload/rawmaterial');
            $image->move($destinationPath, $name);
            $imagename = 'Upload/rawmaterial/'.$name;

            $insert = Rawmaterial::insert([
                'code' => $request->code,
                'name' => $request->name,
                'image' => $imagename,
                'description' => $request->description,
            ]);

            if($insert){
                return redirect(route('rawmaterial-list'))->with('success','Raw Material Added Successfully');
            }else{
                return back()->with('warning','Something Error, check again Please!!');
            }
        }
    }
    // Data Edit Page
    public function materialedit($id){
        $data = RawMaterial::where('id', $id)->first();
        return view('main.admin.rawmaterial.rawmaterial_edit', compact('data'));
    }
    // Data Update
    public function materialupdate($id, Request $request){
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'image' => 'max:200',
        ]);

        $dbtable = RawMaterial::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageunset = public_path($dbtable->image);
            if(File::exists($imageunset)){
                File::delete($imageunset);
            }
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Upload/rawmaterial');
            $image->move($destinationPath, $name);
            $imagename = 'Upload/rawmaterial/'.$name;

            $update = $dbtable->update([
                'code' => $request->code,
                'name' => $request->name,
                'image' => $imagename,
                'description' => $request->description,
            ]);

            if($update){
                return redirect(route('rawmaterial-list'))->with('success','Raw Material Updated with image Successfully');
            }else{
                return back()->with('warning','Something Error, check again Please!!');
            }
        }else{
            $update = $dbtable->update([
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description,
            ]);

            if($update){
                return redirect(route('rawmaterial-list'))->with('success','Raw Material Updated Without img Successfully');
            }else{
                return back()->with('warning','Something Error, check again Please!!');
            }
        }
    }
    // Data Delete
    public function materialdelete($id){
        $materialcheck = RawMaterialcart::where('material_id',$id)->get()->count();
        $materialcheck2 = RawmaterialStock::where('material_id',$id)->get()->count();
        if($materialcheck > 0 || $materialcheck2 > 0){
            return back()->with('warning','Sorry, This product related with other table');
        }else{
            $dbtable = RawMaterial::findOrFail($id);
            $imageunset = public_path($dbtable->image);
            if(File::exists($imageunset)){
                File::delete($imageunset);
            }
            $delete = $dbtable->delete();
            if($delete){
                return back()->with('success','Raw Material Deleted Successfully');
            }else{
                return back()->with('warning','Something Error, check again Please!!');
            }
        }
        
    }
}
