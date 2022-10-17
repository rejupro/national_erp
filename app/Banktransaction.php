<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banktransaction extends Model
{
    protected $table = 'bank_transactions';

    public function project()
    {
    	return $this->belongsTo(Project::class,'project_id','id');
    }
}
