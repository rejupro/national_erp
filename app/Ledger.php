<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['name','grp_id','sub_grp_id','description','uid','brid'];
    public $timestam = false;

    public function group()
    {
    	return $this->belongsTo(Group::class,'grp_id','id');
    }

    public function subgroup()
    {
    	return $this->belongsTo(SubGroup::class,'sub_grp_id','id');
    }
}
