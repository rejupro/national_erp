<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeRead extends Model
{
    protected $fillable=['read_date','bike_no','open_read','oil_cost','end_read','service_cost','comments','created_by'];
    public $timestamps=false;
}
