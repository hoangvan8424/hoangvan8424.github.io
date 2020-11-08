<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCustomer extends FormRequest
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
            'customer_name'                  => 'required',
            'contract_code'         => 'required',
            'product_name'          => 'required',
            'photographer'          => 'required',
            'makeup'                => 'required',
            'shopper'               => 'required',
            'photography_date'      => 'required',
            'branch'                => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required'    => 'Trường này không được để trống',
            'contract_code.required'    => 'Trường này không được để trống',
            'product_name.required'     => 'Trường này không được để trống',
            'photographer.required'     => 'Trường này không được để trống',
            'makeup.required'           => 'Trường này không được để trống',
            'shopper.required'          => 'Trường này không được để trống',
            'photography_date.required' => 'Trường này không được để trống',
            'branch.required'           => 'Trường này không được để trống',
        ];
    }
}
