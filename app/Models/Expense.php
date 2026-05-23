<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    public function categories ()
    {
        return $this->belongsTo(ExpenseCategory::class,'expense_category_id');
    }

    public function banks ()
    {
        return $this->belongsTo(Bank::class,'bank_id');
    }
}
