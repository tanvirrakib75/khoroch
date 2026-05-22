<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = [];

    public function transfers ()
    {
        return $this->hasMany(Transfer::class,'bank_id');
    }

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class,'bank_id');
    }
}
