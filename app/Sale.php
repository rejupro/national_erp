<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['sales_invoice','payable','balance','paid','sales_date','next_date','product_store','ref','created_by','project_id','cusid','note','lc_no','pi_no','lc_value','lc_date','pi_date','lc_bank'];
   
    public function project()
    {
    	return $this->belongsTo(\App\Project::class,'project_id','id');
    }
    
}
