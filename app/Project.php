<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['pgid','psgid','project_id','name','address','cperson','cnumber','prjdetails','prjamount','prjexamount','prjtype','coid','coamount','client','status','brid','uid'];
    public $timestamps = false;
    public function group()
    {
    	return $this->belongsTo(Progroup::class,'pgid','id');
    }
    public function subgroup()
    {
    	return $this->belongsTo(Prosubgroup::class,'psgid','id');
    }
    public function type()
    {
    	return $this->belongsTo(Protype::class,'prjtype','id');
    }
    public function contractor()
    {
    	return $this->belongsTo(Procontractor::class,'coid','id');
    }
    public function customer()
    {
    	return $this->belongsTo(Customer::class,'client','id');
    }

}
