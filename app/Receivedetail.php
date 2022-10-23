<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receivedetail extends Model
{
    protected $table = 'receive_details';
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'pay', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Protype::class, 'type_id','id');
    }
}
