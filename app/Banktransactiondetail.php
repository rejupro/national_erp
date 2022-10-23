<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banktransactiondetail extends Model
{
    protected $table = 'banktrans_details';
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'pay', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Protype::class, 'type_id','id');
    }
}
