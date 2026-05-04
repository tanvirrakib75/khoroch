<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;

class TransferController extends Controller
{
    public function index()
    {
        $transfer = Transfer::orderBy('id','DESC')->get();
        return view('transfer.all',compact('transfer'));
    }

    public function add()
    {
        return view('transfer.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'from_account' => 'required',
            'from_account_number' => 'nullable',
            'to_account' => 'required',
            'to_account_number' => 'nullable',
            'amount' => 'required|numeric|min:1',
            'charge' => 'required|numeric|min:0',
            'transfer_type' => 'required',
            'date' => 'required',
            'note' => 'nullable'
        ]);

        Transfer::create($validateData);

        return redirect(route('transfer'))->with('success','Your transection transfer successfully!');
    }
}
