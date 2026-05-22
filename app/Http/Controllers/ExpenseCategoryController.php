<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $category = ExpenseCategory::where('user_id',auth()->id())->get();
        return view ('expense.category',compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_category'=> 'required'
        ]);

        ExpenseCategory::create([
            'user_id' => auth()->id(),
            'expense_category' => $request->expense_category
        ]);

        return redirect()->back()->with('success','your category has been created');
    } 
}
