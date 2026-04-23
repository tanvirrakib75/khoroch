<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['expense_category_id','expense_name','expense_description','expense_amount','expense_date'];

    public function categories ()
    {
        return $this->belongsTo(ExpenseCategory::class,'expense_category_id');
    }
}
