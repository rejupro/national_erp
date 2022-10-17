<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitionDetails extends Model
{
    protected $fillable = ['requisition_id', 'requisition_item', 'unit_id', 'nprice', 'qty', 'price'];
    public $timestamps = false;
}
