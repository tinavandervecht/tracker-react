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

    /**
     * edit bill
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Bill $bill)
    {
        return view('bills.edit', compact('bill'));
    }

    /**
     * update bill
     *
     * @param BillRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(BillRequest $request, Bill $bill)
    {
        $updatedBill = $request->all();
        $updatedBill['due_date'] = Carbon::parse($request->due_date)->format('d');

        $bill->update($updatedBill);

        return redirect()->route('bills.index')->withSuccess('Bill updated successfully');
    }

    /**
     * destroy bill
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();

        return redirect()->route('bills.index')->withSuccess('Bill deleted successfully');
    }
}
