<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name','status','code','c_name','c_num',
    'c_phone','under_id','c_email','credit_limit','cgrp_id','ranking','address',
    'f_address','uid','brid'];
    public $timestamps = false;

    public function zone()
    {
    	return $this->belongsTo(Zone::class,'under_id','id');
    }

    public function invoices()
    {
        return $this->hasMany(Purchase_detail::class, 'supplier_id', 'id');
    }


}