<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnrequisitionns extends Model
{
    protected $fillable = ['requsition_id','project_id','status','code','stf_id','dsgn_id','cnumber','cemail','address','grand_total','brid'];
    public $timestamps = false;
    protected $table = 'return_requisitions';
    // public function details()
    // {
    //     return $this->hasMany(\App\Returnrequisitiondetails::class);
    // }
    public function project()
    {
    	return $this->belongsTo(\App\Project::class,'project_id','id');
    }
    public function staff()
    {
    	return $this->belongsTo(\App\Employee::class,'stf_id','id');
    }
}
