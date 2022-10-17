<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = ['project_id','status','code','stf_id','dsgn_id','cnumber','cemail','address','grand_total','net_balance','uid','brid'];
    public $timestamps = false;

    public function details()
    {
        return $this->hasMany(\App\RequisitionDetails::class);
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
