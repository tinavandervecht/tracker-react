<?php

namespace ExpenseTracker\Http\Requests;

class BillRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'amount' => 'required|numeric',
            'due_date' => 'required|date'
        ];
    }

    /**
     * Custom error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'due_date.required' => 'Due Date is required',
            'due_date.date' => 'Due Date must be a date',
        ];
    }
}
