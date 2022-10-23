<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progroup extends Model
{
    protected $fillable = ['name','code','description','brid','uid'];
    public $timestamps = false;
}
