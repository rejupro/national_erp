<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_detail extends Model
{
    protected $fillable = ['sale_track','item_id','item_name','cost','price','company_name','supplier_id','color_id','size_id','total','discount','discount_amount','vat','vat_amount','tax','tax_amount','ait','ait_amount','other','other_amount','speed_money','speed_money_amount','freight','freight_amount','fraction_discount','fraction_discount_amount','grand_total','created_by','cookie_id'];
    public $timestam = false;

    public function sale()
    {
        return $this->hasMany(Sale::class, 'sales_invoice', 'sale_track');
    }
    public function product_receipt()
    {
        return $this->belongsTo(\App\Product_delivery::class, 'sales_invoice', 'sale_track');
    }
    public function product()
    {
    	return $this->belongsTo(\App\Product::class,'item_id','id');
    }
    public function supplier()
    {
    	return $this->belongsTo(\App\Supplier::class,'supplier_id','id');
    }
}
