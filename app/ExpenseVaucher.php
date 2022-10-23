<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseVaucher extends Model
{
    protected $table = 'expense_vouchers';

    public function other_creadit()
    {
    	return $this->belongsTo(Currency::class,'other_creadit_id','id');
    }

    public function project()
    {
    	return $this->belongsTo(Project::class,'project_id','id');
    }
    public function staff()
    {
    	return $this->belongsTo(Employee::class,'stf_id','id');
    }

    public function details()
    {
        return $this->hasMany(\App\ExpenseVaucherDetails::class);
    }
}

