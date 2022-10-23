<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    //
    protected $fillable = ['leave_name','leave_days','status','description','created_by'];
    public $timestam = false;
}
