<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosubgroup extends Model
{
    protected $fillable = ['pgid','name','code','description','brid','uid'];
    public $timestamps = false;
}
