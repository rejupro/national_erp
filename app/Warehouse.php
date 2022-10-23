<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable=['warehouse_id','name','phone','email','address'];
    public $timestamps=false;
}
