<?php

namespace ExpenseTracker\Http\Controllers\Ajax\Bills;

use ExpenseTracker\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ExpenseTracker\Models\Bill;

class BillsController extends Controller
{
    /**
     * update bill
     *
     * @param Request $request
     * @param Bill $bill
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->update($request->all());

        return $bill;
    }
}
