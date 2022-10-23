<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    protected $fillable = ['name','description','brid','uid'];
    public $timestamps = false;
    protected $table = 'protypes';

}
