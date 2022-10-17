<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=['name','phone','email','address'];
    public $timestamps=false;
}
