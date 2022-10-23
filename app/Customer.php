<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','status','code','c_name','m_name','nid','c_num','c_phone','c_email','address','s_address','district_id','zone_id','grp_id','credit','ranking','uid','brid'];
    public $timestamps = false;

    public function group()
    {
    	return $this->belongsTo(Group::class,'grp_id','id');
    }
    public function zone()
    {
    	return $this->belongsTo(Zone::class,'zone_id','id');
    }
    public function district()
    {
    	return $this->belongsTo(District::class,'district_id','id');
    }
}
