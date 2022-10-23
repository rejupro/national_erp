<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawmaterialStock extends Model
{
    protected $fillable=['material_id','qty_type','make_material'];
}
