<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterialcart extends Model
{
    protected $fillable=['user_id','material_id','qty_type','quantity'];
}
