<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\Cart;
use App\Purchase_detail;
use App\Bank;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Purchase;
use App\Payment;
use App\Product_receipt;
use App\BranchStock;
use App\BranchTransfer;
use App\WarehouseStock;
use App\WarehouseTransfer;
use Redirect;
use Auth;
use DB;

class Transfer_B_Controller extends Controller
{
    public function index()
    {
        $transfer = DB::table('branch_transfers')
        ->join('products','products.id','=','branch_transfers.product_id')
        ->join('branches','branches.id','=','branch_transfers.branch_id_from')
        ->select('*','branches.name as branch_name','branches.name as branches_name','products.name as product_name')
        ->orderBy('branch_transfers.created_at','desc')
        ->get();
        return view('main.admin.inventory.branch_tr_list',compact('transfer'));
    }

    public function create()
    {
        $branches = Branch::orderBy('created_at','desc')->get();
        $warehouse = Warehouse::orderBy('created_at','desc')->get();
        return view('main.admin.inventory.branch_tr_create',compact('branches','warehouse'));
    }

    public function find_product(Request $request, $branch_id_from)
    {
        $data=DB::table('branch_stocks')
        ->join('products','products.id','=','branch_stocks.product_id')
        ->where('branch_stocks.branch_id',$branch_id_from)
        ->select('*','products.name as product_name')
        ->get();
        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        $input['branch_id_from'] = $request->branch_id_from;
        $input['branch_id_to'] = $request->branch_id_to;
        $input['warehouse_id_to'] = $request->warehouse_id_to;
        $input['product_id'] = $request->product_id;
        $input['quantity'] = $request->quantity;
        $input['created_by'] = Auth::User()->name;
        if($request->branch_id_to){
            $branch_form = BranchStock::where('product_id',$request->product_id)->first();
            $new_qty_from = $branch_form->quantity - $request->quantity;
            $update_branch_form = BranchStock::where('branch_id',$request->branch_id_from)->update(['quantity' => $new_qty_from, ]);
            $branch_to = BranchStock::where('branch_id',$request->branch_id_to)->first();
            if($branch_to){
                $new_qty_to = $branch_to->quantity + $request->quantity;
                $update_branch_to = BranchStock::where('branch_id',$request->branch_id_to)->update(['quantity' => $new_qty_to, ]);
            }else{
                $insert_branch_to = BranchStock::insert([
                    'branch_id' => $branch_form->branch_id ,
                    'product_id' => $branch_form->product_id ,
                    'invoice' => $branch_form->invoice ,
                    'quantity' => $request->quantity ,
                    'created_by' => Auth::User()->name,
                ]);
            }
        }
        else{
            $branch_form = BranchStock::where('product_id',$request->product_id)->first();
            $new_qty_from = $branch_form->quantity - $request->quantity;
            $update_branch_form = BranchStock::where('branch_id',$request->branch_id_from)->update(['quantity' => $new_qty_from, ]);
            $warehouse_to = WarehouseStock::where('warehouses_id',$request->warehouse_id_to)->first();
            if ($warehouse_to) {
                $new_qty_to = $warehouse_to->quantity + $request->quantity;
                $update_warehouse_to = WarehouseStock::where('warehouses_id',$request->warehouse_id_to)->update(['quantity' => $new_qty_to, ]);
            }
            else{
                $insert_warehouse_to = WarehouseStock::insert([
                    'warehouses_id' => $warehouse_from->warehouses_id ,
                    'product_id' => $warehouse_from->warehouses_id ,
                    'invoice' => $warehouse_from->invoice ,
                    'quantity' => $request->quantity ,
                    'created_by' => Auth::User()->name,
                ]);
            }
        }
        BranchTransfer::insert($input);
        return Redirect::route('branch-transfer-stock-list')->with('success', 'Products Transferred Successfully...!!!');

    }
}
