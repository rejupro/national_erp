<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['sort' ,'name','address','contact'];
    public $timestamp = false;
}
