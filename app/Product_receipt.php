<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_receipt extends Model
{
    protected $fillable = ['purchase_track','order_no','challan_no','rcv_date','note','item_id','item_name','purchase_qty','rcv_qty','rest_qty','now_qty','created_by'];
    public $timestam = false;
}