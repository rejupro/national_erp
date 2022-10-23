<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expensehead extends Model
{
    protected $fillable = ['name','e_type','description','uid','brid'];
    public $timestam = false;
}
