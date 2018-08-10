<?php

namespace ExpenseTracker\Http\Controllers;

use ExpenseTracker\Http\Controllers\Controller;
use ExpenseTracker\Models\Bill;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Load home page
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
        $currentDay = Carbon::now()->format('d');
        $latestDay = Carbon::now()->addWeeks(2)->format('d');

        $upcomingBills = Bill::where('due_date', '>=', $currentDay)
            ->where('due_date', '<=', $latestDay)
            ->get();

        return view('index', compact('upcomingBills'));
    }
}
