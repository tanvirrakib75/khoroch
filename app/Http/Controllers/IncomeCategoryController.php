<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeCategory;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        return view ('income.category');
    }

    public function store (Request $request)
    {
        $request->validate([
            'income_category' => 'required'
        ]);

        IncomeCategory::create([
            'income_category' => $request->income_category
        ]);

        return redirect(route('income.category'))->with('success','your income category has been created');
    }
}
