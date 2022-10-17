<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseTransfer extends Model
{
    protected $fillable=['warehouse_id_from','warehouse_id_to','product_id','quantity','created_by'];
    public $timestamps=false;
}
