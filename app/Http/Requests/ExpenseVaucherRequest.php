<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseVaucherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expense_no' => 'required',
            'other_creadit_id' => 'required',
            'date' => 'required',
            'project_id' => 'required',
            'note' => 'required',
            'expid_dtl' => 'required',
            'ref_dtl' => 'required',
            'amount_dtl' => 'required',
            'mtype_dtl' => 'required',
        ];
    }
    // public function messages()
    // {
    //     'expense_no.required' = 'Expense No is required',
    //         'other_creadit_id.required' = 'Credit No is required',
    //         'date.required' = 'Date is required',
    //         'project_id' => 'required',
    //         'note' => 'required',
    //         'expense_head_id' => 'required',
    //         'ref' => 'required',
    //         'amount' => 'required',
    //         'type_id' => 'required',
    // }
}
