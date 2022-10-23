<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentdetail extends Model
{
    protected $table = 'payment_details';
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'payment_to', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Protype::class, 'type_id','id');
    }
}
