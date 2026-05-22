<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\IncomeCategory;
use App\Models\Account;

class IncomeController extends Controller
{
    public function index ()
    {
        $income = Income::with('categories')->where('user_id',auth()->id())->orderBy('date','desc')->get();
        $income_category = IncomeCategory::where('user_id',auth()->id())->get();
        return view ('income.all',compact('income','income_category'));
    }

    public function add ()
    {   
        $income_category = IncomeCategory::where('user_id',auth()->id())->get();
        return view ('income.add',compact('income_category'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'income_name' => 'required',
            'income_description' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'income_category_id' => 'required|exists:income_categories,id'
        ]);

        Income::create([
            'user_id' => auth()->id(),
            'income_name' => $request->income_name,
            'income_description' => $request->income_description,
            'amount' => $request->amount,
            'date' => $request->date,
            'income_category_id' => $request->income_category_id
        ]);

        return redirect(route('income'))->with('success','your income has been created successfully');
    }




    public function edit($id)
    {  
        $income = Income::findOrFail($id);
        $category = IncomeCategory::where('user_id',auth()->id())->get();
        return view ('income.edit',compact('income','category'));
    }

    public function update ($id, Request $request)
    {
        $request->validate([
            'income_name' => 'required',
            'income_description' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'income_category_id' => 'required|exists:income_categories,id'
        ]);

        $income = Income::findOrFail($id);

        $income->update([
             'income_name' => $request->income_name,
            'income_description' => $request->income_description,
            'amount' => $request->amount,
            'date' => $request->date,
            'income_category_id' => $request->income_category_id
        ]);

        return redirect(route('income'))->with('success','your income has been updated');

    }
}
