<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Income;
use App\Models\Expense;

class DashboardController extends Controller
{
    public function index()
    {

        // ১. বর্তমানে কত টাকা বিনিয়োগ অবস্থায় আছে (Active)
        $currentInvest = Investment::where('status', 'active')->sum('invest_amount');

        // ২. ইনভেস্টমেন্ট থেকে মোট লাভ (Income টেবিল থেকে)
        $totalProfit = Income::where('income_description', 'like', '%Profit from%')->sum('amount');

        // ৩. ইনভেস্টমেন্ট থেকে মোট লস (Expense টেবিল থেকে)
        $totalLoss = Expense::where('expense_description', 'like', '%Loss from%')->sum('expense_amount');

        // ৪. নিট প্রফিট (লাভ - লস)
        $netInvestmentResult = $totalProfit - $totalLoss;

        return view('welcome', compact(
            'currentInvest', 
            'totalProfit', 
            'totalLoss', 
            'netInvestmentResult'
        ));
    }
}
