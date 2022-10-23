<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyExpenseModel extends Model
{
    protected $fillable = ['voucher_no','project_id','grand_total','date','stf_id','address','pay_vaucher_id','amount','balance','net_balance','uid','brid'];
    public $timestamps = false;
    public function details()
    {
        return $this->hasMany(\App\DailyExpenseModelDetails::class);
    }
    public function project()
    {
    	return $this->belongsTo(\App\Project::class,'project_id','id');
    }
    public function staff()
    {
    	return $this->belongsTo(\App\Employee::class,'stf_id','id');
    }
} 