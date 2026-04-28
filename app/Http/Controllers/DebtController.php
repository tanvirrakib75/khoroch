<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;

class DebtController extends Controller
{
    public function index()
    {
        $data = Debt::orderBy('id','DESC')->get();
        return view ('debt.all',compact('data'));
    }


    public function add()
    {
        return view ('debt.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'person_name'=> 'required',
            'amount' =>  'required',
            'type' => 'required|in:take,give',
            'note' => 'nullable|string:'
        ]);

        $validateData['status'] = $request->has('status') ? 1 : 0;

        Debt::create($validateData);

        return redirect()->back()->with('success','Your Debt Created Successfully');
    }

    public function edit($id)
    {
        $data = Debt::findOrFail($id);
        return view ('debt.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validateData = $request->validate([
            'person_name'=> 'required',
            'amount' =>  'required',
            'type' => 'required|in:take,give',
            'note' => 'nullable|string:'
        ]);

        $validateData['status'] = $request->has('status') ? 1 : 0;

        $data = Debt::findOrFail($id);

        $data -> update($validateData);

        return redirect()->back()->with('success','Your Debt updated Successfully');
    }

    

}
