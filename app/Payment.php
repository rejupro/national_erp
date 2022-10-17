<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['pur_invoice','order_no','payable','due','paid','purchase_date','bank_id','cheque_no','cheque_date','caname','chbid','w_bid','mobid','trxid','created_by'];
    public $timestamps = false;
}
