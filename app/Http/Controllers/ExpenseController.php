<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Bank;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Expense::where('user_id',auth()->id())->with('categories')->orderBy('expense_date','desc')->get();
        $category = ExpenseCategory::where('user_id',auth()->id())->get();
        $banks = Bank::where('user_id',auth()->id())->get();
        return view ('expense.all',compact('expense','category','banks'));
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
            'bank_id' => 'required|exists:banks,id'
        ]);

        Expense::create([
            'user_id' => auth()->id(),
            'expense_description' => $request->expense_description,
            'expense_amount' => $request->expense_amount,
            'expense_name' => $request->expense_name,
            'expense_date'=> $request->expense_date,
            'expense_category_id' => $request->expense_category_id,
            'bank_id' =>$request->bank_id
        ]);

        $banks = Bank::where('id',$request->bank_id)->where('user_id',auth()->id())->first();

        if($banks)
            {
                $banks->current_balance = $banks->current_balance - $request->expense_amount;
                $banks->save();
            }

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
