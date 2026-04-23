<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = ['expense_category'];

    public function expenses ()
    {
        return $this->hasMany(Expense::class,'expense_categories_id');
    }
}
