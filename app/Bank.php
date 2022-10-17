<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['sort','name','bname','uid','brid'];
    public $timestamps = false;
}
