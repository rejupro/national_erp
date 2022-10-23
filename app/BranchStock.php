<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchStock extends Model
{
    protected $fillable=['branch_id','product_id','invoice','quantity','purchase_qty','recv_qty','rest_qty','sold_qty','deli_qty','return_qty','dp_qty','created_by'];
    public $timestamps=false;
}
