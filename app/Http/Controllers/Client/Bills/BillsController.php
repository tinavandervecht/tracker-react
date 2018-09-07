<?php

namespace ExpenseTracker\Http\Controllers\Client\Bills;

use ExpenseTracker\Http\Controllers\Controller;
use ExpenseTracker\Http\Requests\BillRequest;
use ExpenseTracker\Models\Bill;
use Illuminate\Support\Facades\Auth;

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
        $bill = Bill::create($request->all());

        $bill->user()->associate(Auth::user());
        $bill->save();

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
        $bill->update($request->all());

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
