<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawOthermaterial extends Model
{
    protected $fillable=['code','name', 'price', 'image','description'];
}
