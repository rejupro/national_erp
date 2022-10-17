<?php

namespace App;
use App\AccountClass;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name','class_name','description','uid','brid'];
    public $timestamps = false;
    public function class()
    {
    	return $this->belongsTo(AccountClass::class,'class_name','id');
    }
}
