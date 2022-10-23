<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountsreportController extends Controller
{
    public function ledgerstate(){
        return view('main.admin.report.rep_accledgerstate');
    }
    public function cashstate(){
        return view('main.admin.report.rep_acccashstate');
    }
    public function bankstate(){
        return view('main.admin.report.rep_accbankstate');
    }
    public function mobilestate(){
        return view('main.admin.report.rep_accmobilestate');
    }
    public function profitloss(){
        return view('main.admin.report.rep_accprofitloss');
    }
    public function journalhistory(){
        return view('main.admin.report.rep_accjournalhistory');
    }

    public function trailbalance(){
        return view('main.admin.report.rep_acctrialbalance');
    }
    public function balancesheet(){
        return view('main.admin.report.rep_accbalancesheet');
    }
    public function overview(){
        return view('main.admin.report.rep_accoverview');
    }

}
