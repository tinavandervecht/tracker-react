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
        $currentDate = Carbon::now();
        $latestDate = Carbon::now()->addWeeks(2);
        $bills = Bill::get();
        $upcomingBills = $bills->filter(function($bill) use ($currentDate, $latestDate) {
            $year = Carbon::now()->format('Y');
            $month = Carbon::now()->format('m');

            return Carbon::parse($year . '-' . $month . '-' . $bill->due_date)
                ->between($currentDate, $latestDate)
                && !$bill->paid;
        })->values();

        return view('index', compact('upcomingBills'));
    }
}
