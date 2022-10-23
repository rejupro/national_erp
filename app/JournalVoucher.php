<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalVoucher extends Model
{
    protected $fillable = ['journal_no','date','project_id','narration','total','uid','brid'];
    public $timestamps = false;

     public function project()
    {
    	return $this->belongsTo(Project::class,'project_id','id');
    }

}
