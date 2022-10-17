<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = ['manufacture_name','c_person','c_mobile','c_email','address','main_product','description','web','rank','uid','brid'];
    public $timestamps = false;
}
