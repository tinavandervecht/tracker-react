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
            'due_date' => 'required|numeric'
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
            'due_date.numeric' => 'Due Date must be a number',
        ];
    }

    /**
     * Extend validator and add an after closure
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        if (!$validator->fails()) {
            $validator->after(function () use ($validator) {
                if ($this->input('due_date') < 1 || $this->input('due_date') > 31) {
                    $validator->errors()->add('due_date', 'Due date must be between 1 and 31.');
                }
            });
        }

        return $validator;
    }
}
