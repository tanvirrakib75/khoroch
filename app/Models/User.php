<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//models
use App\Models\Income;
use App\Models\Expense;
use App\Models\Bank;
use App\Models\Debt;
use App\Models\ExpenseCategroy;
use App\Models\IncomeCategory;
use App\Models\Transfer;
use App\Models\Withdraw;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function bank()
    {
        return $this->hasMany(Bank::class);
    }

    public function debt()
    {
        return $this->hasMany(Debt::class);
    }

    public function expenseCategory()
    {
        return $this->hasMany(ExpenceCategroy::class);
    }

    public function incomeCategory()
    {
        return $this->hasMany(IncomeCategroy::class);
    }

    public function transfer()
    {
        return $this->hasMany(Transfer::class);
    }

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class);
    }

}
