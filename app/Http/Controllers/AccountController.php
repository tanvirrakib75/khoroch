<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function add ()
    {
        return view ('account.add');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'account_name' => 'required',
            'account_number' => 'required',
            'balance' => 'required'
        ]);

        $account = Account::create([
            "account_name" => $request->account_name,
            "account_number" => $request->account_number,
            "balance" => $request->balance
        ]);

        return redirect()->back()->with('success','your account has been created successfully !');
    }
}
