<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['pur_invoice','payable','balance','paid','purchase_date','next_date','product_store','ref','created_by','project_id','supid','note','lc_no','pi_no','lc_value','lc_date','pi_date','lc_bank'];

    public function project()
    {
    	return $this->belongsTo(\App\Project::class,'project_id','id');
    }
    public function supplier()
    {
    	return $this->belongsTo(\App\Supplier::class,'project_id','id');
    }

}
