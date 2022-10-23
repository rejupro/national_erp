<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = ['desg_name','description','created_by','brid'];
    public $timestamps = false;
}
