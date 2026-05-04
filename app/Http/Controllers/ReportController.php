<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Withdraw;

class ReportController extends Controller
{
    public function report()
    {
        $transfer = Transfer::all()->map(function ($item){
            return [
                'date' => $item->date,
                'type' => 'Transfer',
                'details' => $item->from_account. " to " . $item->to_account,
                'amount' => $item->amount,
                'charge' => $item->charge,
                'total' => $item->amount. " + " . $item->charge
            ];
        });

        $withdraw = Withdraw::all()->map(function ($item){
            return [
                'date' => $item->date,
                'type' => 'Withdraw',
                'details' => $item->withdraw_from. " (Cash out) ",
                'amount' => $item->amount,
                'charge' => $item->charge,
                'total' => $item->amount. " + " .$item->charge
            ];
        });

        $allReport = $transfer->concat($withdraw)->sortByDesc('date');
        return view ('bank.report',compact('allReport'));
    }
}
