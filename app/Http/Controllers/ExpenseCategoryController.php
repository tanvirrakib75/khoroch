<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        return view ('expense.category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_category'=> 'required'
        ]);

        ExpenseCategory::create([
            'expense_category' => $request->expense_category
        ]);

        return redirect()->back()->with('success','your category has been created');
    } 
}
