<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['item_id','item_name','cost','price','company_name','supplier_id','supplier_name','color','total','discount','discount_amount','vat','vat_amount','tax','tax_amount','ait','ait_amount','other','other_amount','speed_money','speed_money_amount','freight','freight_amount','fraction_discount','fraction_discount_amount','grand_total','created_by','cookie_id'];
    public $timestam = false;
}
