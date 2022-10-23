<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialCart extends Model
{
    protected $fillable = ['cookie_id','item_id','item_name','cost','quantity','price','project_id','project_name','created_by'];
    public $timestamps = false;
}