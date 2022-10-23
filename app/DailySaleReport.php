<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailySaleReport extends Model
{
    protected $fillable = ['company_name','contract_name','contract_email','contract_designation','contract_mobile','interested_product','contract_address','comments','employee_id','branch_id','contract_date','created_by'];
    public $timestamps = true;
}
