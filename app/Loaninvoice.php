<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaninvoice extends Model
{
    protected $table = 'loaninvoices';
    protected $fillable = ['inv_no','loan_id','installment','amount','total','status','profi_per','profit_amount','note','uid','brid'];
    public $timestam = false;
}
