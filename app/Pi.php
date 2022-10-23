<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pi extends Model
{
    protected $table = 'pis';
    public function supplier()
    {
    	return $this->belongsTo(Supplier::class,'s_id','id');
    }
    public function buyer()
    {
    	return $this->belongsTo(Supplier::class,'b_id','id');
    }
}
