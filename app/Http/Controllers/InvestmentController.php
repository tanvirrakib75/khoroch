<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Income;
use App\Models\Expense;

class InvestmentController extends Controller
{
    public function index()
    {
        $data = Investment::orderBy('id','DESC')->get();
        return view ('investment.all',compact('data'));
    }

    public function add()
    {
        return view('investment.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'bank_name' => 'required',
            'invest_amount' => 'required',
            'return_amount' => 'required',
            'invest_date' => 'required',
            'note' => 'required',
            'status' => 'required|in:active,completed'
        ]);

        Investment::create($validateData);
        return redirect()->back()->with('success','Your investment created successfully');
    }

    public function edit($id)
    {
        $data = Investment::findOrFail($id);
        return view('investment.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {

        $validateData = $request->validate([
            'bank_name' => 'required',
            'invest_amount' => 'required',
            'return_amount' => 'required',
            'invest_date' => 'required',
            'note' => 'required',
            'status' => 'required|in:active,completed'
        ]);

        $data = Investment::findOrFail($id);

        $data->update($validateData);

        return redirect()-back()->with('success','Your investment edited successfully!');

        
        
        

    }
}
