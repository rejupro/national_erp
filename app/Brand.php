<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['name','description','uid','brid'];
    public $timestamps=false;
}
