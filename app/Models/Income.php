<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];

    public function categories ()
    {
        return $this->belongsTo(IncomeCategory::class,'income_category_id');
    }
}
