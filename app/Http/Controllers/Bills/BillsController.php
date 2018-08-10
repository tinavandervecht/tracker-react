<?php

namespace ExpenseTracker\Http\Controllers\Bills;

use ExpenseTracker\Http\Controllers\Controller;
use ExpenseTracker\Http\Requests\BillRequest;
use ExpenseTracker\Models\Bill;
use Carbon\Carbon;

class BillsController extends Controller
{
    /**
     * create new bill
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function create()
    {
        return view('bills.create');
    }

    /**
     * store new bill
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function store(BillRequest $request)
    {
        $newBill = $request->all();
        $newBill['due_date'] = Carbon::parse($request->due_date)->format('m-d');

        Bill::create($newBill);

        return redirect()->route('home')->withSuccess('Bill created successfully');
    }
}
