<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawStockCart extends Model
{
    protected $fillable=['user_id','material_id', 'material_name', 'qty_type'];
}
