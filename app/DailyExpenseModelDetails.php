<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyExpenseModelDetails extends Model
{
    protected $fillable = ['daily_expense_model_id','product_id','unit_id','type','qty','price'];
    public $timestamps = false;

    public function unit()
    {
    	return $this->belongsTo(\App\Unit::class,'unit_id','id');
    }
    public function types()
    {
    	return $this->belongsTo(\App\Protype::class,'type','id');
    }
}
