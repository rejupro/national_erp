<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalVoucherDetail extends Model
{
    protected $fillable = ['journal_voucher_id','debit_sub_group_id','debit_ledger_id','debit_amount','credit_ledger_id','credit_sub_group_id','cheque_no','cheque_date','ref'];
    public $timestamps = false;

    public function journals()
    {
        return $this->belongsTo(JournalVoucher::class,'journal_voucher_id','id');

    }

}
