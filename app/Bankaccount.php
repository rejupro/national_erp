<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankaccount extends Model
{
    protected $fillable = ['bid','acc_no','acc_title','bbrname','bbrcode','bbrlocation','debit','credit','balance','uid','brid'];
    public $timestamps = false;

    public function bank()
    {
    	return $this->belongsTo(Bank::class,'bid','id');
    }
}

