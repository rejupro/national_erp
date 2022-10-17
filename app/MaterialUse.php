<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialUse extends Model
{
    protected $fillable = ['record_no','cookie_id','challan_date','ref','send_person_id','send_person_name','note','item_id','item_name','cost','quantity','price','project_id','project_name','created_by','uid','brid'];
}
