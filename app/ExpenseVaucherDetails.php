<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseVaucherDetails extends Model
{
    protected $table = 'expense_details';
    
    public function expensehead()
    {
        return $this->belongsTo(Supplier::class, 'expense_head', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Protype::class, 'type_id','id');
    }
}
