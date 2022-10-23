<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['dept_id','desg_id','name','fname','mobile','email','mname','phone','nidno','dob','join_date','salary','status','wbrid','item','address','paddress','created_by','uid','brid'];
    public $timestam = false;

    public function department()
    {
    	return $this->belongsTo(Department::class,'dept_id','id');
    }
    public function designation()
    {
    	return $this->belongsTo(Designation::class,'desg_id','id');
    }
    public function branch()
    {
    	return $this->belongsTo(Branch::class,'wbrid','id');
    }
}
