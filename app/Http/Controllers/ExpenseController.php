<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Expense::where('user_id',auth()->id())->with('categories')->orderBy('expense_date','desc')->get();
        $category = ExpenseCategory::where('user_id',auth()->id())->get();
        return view ('expense.all',compact('expense','category'));
    }


    public function add()
    {
        $category = ExpenseCategory::where('user_id',auth()->id())->get();
        return view ('expense.add',compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expense_description' => 'required',
            'expense_amount' => 'required',
            'expense_name' => 'required',
            'expense_date' => 'required',
            'expense_category_id' => 'required|exists:expense_categories,id',
        ]);

        Expense::create([
            'user_id' => auth()->id(),
            'expense_description' => $request->expense_description,
            'expense_amount' => $request->expense_amount,
            'expense_name' => $request->expense_name,
            'expense_date'=> $request->expense_date,
            'expense_category_id' => $request->expense_category_id
        ]);

        return redirect(route('expense'))->with('success','your expense has been created');
        
    }

    public function edit ($id)
    {
        $expense = Expense::findOrFail($id);
        $category = ExpenseCategory::where('user_id',auth()->id())->get();

        return view ('expense.edit',compact('expense','category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'expense_description' => 'required',
            'expense_amount' => 'required',
            'expense_name' => 'required',
            'expense_date' => 'required',
            'expense_category_id' => 'required|exists:expense_categories,id',
        ]);

        $expense = Expense::findOrFail($id);

        $expense->update([
            'expense_description' => $request->expense_description,
            'expense_amount' => $request->expense_amount,
            'expense_name' => $request->expense_name,
            'expense_date'=> $request->expense_date,
            'expense_category_id' => $request->expense_category_id
        ]);

        return redirect(route('expense'))->with('success','your expense has been created');

    }

}
