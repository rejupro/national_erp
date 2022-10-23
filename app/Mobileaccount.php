<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobileaccount extends Model
{
    protected $fillable = ['mname','bname','mobile','doposit','widrawn','balance','brid','uid'];
    public $timestamps = false;
}
