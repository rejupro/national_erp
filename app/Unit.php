<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name','description','uid','brid'];
    public $timestamp = false ;
}
