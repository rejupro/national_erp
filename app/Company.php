<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','bname','dialog','bdialog','mobile','phone','fax','web','email','tin','vat','address','baddress','image','created_by'];
    public $timestamps = false;
    protected $table = 'companys';
}
