<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_Group extends Model
{
    protected $fillable = ['name','description'];
    public $timestam = false;
}
