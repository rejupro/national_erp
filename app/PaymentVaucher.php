<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Type;

class PaymentVaucher extends Model
{
    protected $table = 'payment_vauchers';

    public function project()
    {
    	return $this->belongsTo(Project::class,'project_id','id');
    }
 
}
