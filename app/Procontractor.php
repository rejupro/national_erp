<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procontractor extends Model
{
    protected $fillable = ['code','name','mobile','email','address','note','status','brid','uid'];
    public $timestamps = false;
}
