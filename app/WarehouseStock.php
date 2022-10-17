<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseStock extends Model
{
    protected $fillable=['warehouses_id','product_id','invoice','quantity','purchase_qty','recv_qty','rest_qty','sold_qty','deli_qty','return_qty','dp_qty','created_by'];
    public $timestamps=false;
}
