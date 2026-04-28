<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DebtController;
// use App\Http\Controllers\AccountController;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('welcome');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
    return view('welcome');
})->name('home');

// Expense start from here --
Route::get('/expense',[ExpenseController::class,'index'])->name('expense');
Route::get('/expense/add',[ExpenseController::class,'add'])->name('expense.add'); 
Route::post('/expense/add',[ExpenseController::class,'store'])->name('expense.store');
Route::get('/expense/edit/{id}',[ExpenseController::class,'edit'])->name('expense.edit');
Route::post('/expense/edit/{id}',[ExpenseController::class,'update'])->name('expense.update');

// expense category start from here -- 
Route::get('/expense/category/add',[ExpenseCategoryController::class,'index'])->name('expense.category.add'); 
Route::post('/expense/category/add',[ExpenseCategoryController::class,'store'])->name('expense.category.store'); 

// Income start form here --
Route::get('/income',[IncomeController::class,'index'])->name('income');
Route::get('/income/add',[IncomeController::class,'add'])->name('income.add');
Route::post('/income/add',[IncomeController::class,'store'])->name('income.store');
Route::get('/income/add/{id}',[IncomeController::class,'edit'])->name('income.edit');
Route::post('/income/add/{id}',[IncomeController::class,'update'])->name('income.update');


// Income category start from here --
Route::get('/income/category',[IncomeCategoryController::class,'index'])->name('income.category');
Route::post('/income/category',[IncomeCategoryController::class,'store'])->name('income.category.store');

// Bank start from here --
Route::get('/bank',[BankController::class,'index'])->name('bank');
Route::get('/bank/add',[BankController::class,'add'])->name('bank.add');
Route::post('/bank/add',[BankController::class,'store'])->name('bank.store');
Route::get('/bank/edit/{id}',[BankController::class,'edit'])->name('bank.edit');
Route::post('/bank/edit/{id}',[BankController::class,'update'])->name('bank.update');

// // Account start from here -- 
Route::get('/account/add',[AccountController::class,'add'])->name('account.add');
Route::post('/account/add',[AccountController::class,'store'])->name('account.store');


// Debt start from here 
Route::get('/debt',[DebtController::class,'index'])->name('debt');
Route::get('/debt/add',[DebtController::class,'add'])->name('debt.add');
Route::post('/debt/add',[DebtController::class,'store'])->name('debt.store');
Route::get('/debt/edit/{id}',[DebtController::class,'edit'])->name('debt.edit');
Route::post('/debt/edit/{id}',[DebtController::class,'update'])->name('debt.update');







// Profile start from here
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});




Route::fallback(function () 
    {
        return redirect('welcome');
    }
);

require __DIR__.'/auth.php';
