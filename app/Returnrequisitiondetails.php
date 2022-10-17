<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnrequisitiondetails extends Model
{
    protected $fillable = ['rereq_id', 'requisition_item', 'unit_id', 'nprice', 'qty', 'price'];
    public $timestamps = false;
    protected $table = 'return_requisition_details';
}
