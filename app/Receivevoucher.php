<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receivevoucher extends Model
{
    protected $table = 'receive_vouchers';

    public function project()
    {
    	return $this->belongsTo(Project::class,'project_id','id');
    }
}
