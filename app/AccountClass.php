<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountClass extends Model
{
    protected $fillable=['name','description'];
    public $timestamps=false;


}

