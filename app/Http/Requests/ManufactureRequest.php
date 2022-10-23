<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufactureRequest extends FormRequest
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
            'manufacture_name' => 'required',
            'c_mobile' => 'required',
            'main_product' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'manufacture_name.required' => 'Name is required',
            'c_mobile.required' => 'Contact No. is required',
            'main_product.required' => 'Main product is required',
            'address.required' => 'Address is required',
        ];
    }
}
