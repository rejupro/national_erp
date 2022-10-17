<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Combined_StockController extends Controller
{
    public function index()
    {
        return view('main.admin.inventory.combined_stock');
    }
}
