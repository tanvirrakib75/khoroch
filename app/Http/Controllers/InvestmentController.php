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

        $investment = Investment::findOrFail($id);

        $validateData = $request->validate([
            'bank_name' => 'required',
            'invest_amount' => 'required',
            'return_amount' => 'required',
            'invest_date' => 'required',
            'note' => 'required',
            'status' => 'required|in:active,completed'
        ]);

    //আসল লজিক শুরু: 
    // আমরা চেক করছি—ইউজার কি এখন 'completed' সিলেক্ট করেছে? 
    // এবং আগে কি এটা 'active' ছিল? (যাতে একই লাভ-ক্ষতি বারবার ইনকাম/এক্সপেন্সে না যায়)

        if ($request->status == 'completed' && $investment->status == 'active'){
            $result = $request->return_amount - $request->invest_amount;

            if( $result > 0 )
            // যদি রেজাল্ট ০ এর চেয়ে বড় হয়, মানে লাভ হয়েছে।
            // তাই Income টেবিলে নতুন ডেটা ইনসার্ট করছি।
                {
                    Income::create([
                        'income_name'        => 'Investment Profit',
                        'amount' => $result,
                        'income_description' => 'Investment Profit: '. $investment->bank_name,
                        'date' => now()
                    ]);
                }
                elseif($result < 0)
                    {
                        Expense::create([
                            'amount' => abs($result),
                            'note' => 'Investmet Loss: ' . $investment->bank_name,
                            'date' => now()
                        ]);

                    }
        }
        
        $investment->update($request->all());
        return redirect(route('investment'))->with('success','Your invesment updated successfully');

    }
}
