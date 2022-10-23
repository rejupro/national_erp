<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','code','parent_id','cat_id','sub_cat_id',
    'brand_id','manufac_id','unit_id','pur_scan','country_id','status','certificate',
    'min_stock','model','brand_no','cost','price','w_day','barcode','description','avater','brid','uid'];
    public $timestamps = false;

    // public function parent()
    // {
    // 	return $this->belongsTo(Manufacture::class,'parent_id','id');
    // }
    public function category()
    {
    	return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class,'sub_cat_id','id');
    }
    public function brand()
    {
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function manufacture()
    {
    	return $this->belongsTo(Manufacture::class,'manufac_id','id');
    }
    public function unit()
    {
    	return $this->belongsTo(Unit::class,'unit_id','id');
    }


}
