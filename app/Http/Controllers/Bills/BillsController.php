<?php

namespace ExpenseTracker\Http\Controllers\Bills;

use ExpenseTracker\Http\Controllers\Controller;
use ExpenseTracker\Http\Requests\BillRequest;
use ExpenseTracker\Models\Bill;
use Carbon\Carbon;

class BillsController extends Controller
{
    /**
     * view all bills
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bills = Bill::all();

        return view('bills.index', compact('bills'));
    }

    /**
     * create new bill
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('bills.create');
    }

    /**
     * store new bill
     *
     * @param BillRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(BillRequest $request)
    {
        $newBill = $request->all();
        $newBill['due_date'] = Carbon::parse($request->due_date)->format('d');

        Bill::create($newBill);

        return redirect()->route('home')->withSuccess('Bill created successfully');
    }
}
