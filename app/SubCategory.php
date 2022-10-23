<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name','cat_id','description'];
    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo(Category::class,'cat_id','id');
    }
}
