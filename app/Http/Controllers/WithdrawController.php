<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraw = Withdraw::where('user_id',auth()->id())->orderBy('id','DESC')->get();
        return view('withdraw.all',compact('withdraw'));
    }

    public function add()
    {
        return view('withdraw.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'withdraw_from' => 'required',
            'account_number' => 'nullable',
            'amount' => 'required',
            'charge' => 'required',
            'date' => 'required',
            'note' => 'nullable'
        ]);

        $validateData['user_id'] = auth()->id();

        Withdraw::create($validateData);

        return redirect(route('withdraw'))->with('success','Your transection transfer successfully!');
}

}