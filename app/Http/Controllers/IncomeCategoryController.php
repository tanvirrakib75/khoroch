<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeCategory;

class IncomeCategoryController extends Controller
{
    public function index()
    {   
        $income_category = IncomeCategory::where('user_id',auth()->id())->get();
        return view ('income.category',compact('income_category'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'income_category' => 'required'
        ]);

        IncomeCategory::create([
            'user_id' => auth()->id(),
            'income_category' => $request->income_category
        ]);

        return redirect(route('income.category'))->with('success','your income category has been created');
    }
}
