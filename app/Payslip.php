<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    protected $fillable = ['emp_id','month','branch_id','salary','present_day','absent_day','due_salary','fine','loan','salary_advance','commission','net_payable','remark','created_by'];
    public $timestamps = false;
}
