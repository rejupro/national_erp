<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
{
    protected $fillable = ['name','grp_id','description'];
    public $timestam = false;

    public function group()
    {
    	return $this->belongsTo(Group::class,'grp_id','id');
    }
}
