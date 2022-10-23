<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['emp_id','branch_id1','branch_name1','salary1','branch_id2','branch_name2','salary2','branch_id3','branch_name3','salary3','total_salary','created_by'];
}
