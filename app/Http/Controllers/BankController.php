<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        $data = Bank::all();
        return view ('bank.all',compact('data'));
    }

    public function add()
    {
        return view('bank.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'bank_account_number' => 'required',
            'current_balance' => 'required'
        ]);

        Bank::create([
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'current_balance' => $request->current_balance
        ]);

        return redirect(route('bank'))->with('success','your bank information has been created');
    }

    public function edit($id)
    {
        $data = Bank::findOrFail($id);
        return view ('bank.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'bank_name' => 'required',
            'bank_account_number' => 'required',
            'current_balance' => 'required'
        ]);

        $data = Bank::findOrFail($id);

        $data -> update([
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'current_balance' => $request->current_balance
        ]);

        return redirect(route('bank'))->with('success','your bank information has been edited');


    }
}
