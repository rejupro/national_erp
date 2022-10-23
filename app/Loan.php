<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['name','code','acc_no','type','mobile','address','amount','debit','credit','balance','description','uid','brid'];
    public $timestam = false;
}
