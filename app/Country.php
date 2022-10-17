<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','description','uid','brid'];
    public $timestam = false;
}
