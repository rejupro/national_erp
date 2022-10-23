<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawmaterialStockDetail extends Model
{
    protected $fillable=['material_id','maken_invoice','quantity','date'];
}
