<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchTransfer extends Model
{
    protected $fillable=['branch_id_from','branch_id_to','product_id','quantity','created_by'];
    public $timestamps=false;
}
