<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [ 'income_name','income_description','amount','date','income_category_id'];

    public function categories ()
    {
        return $this->belongsTo(IncomeCategory::class,'income_category_id');
    }
}
