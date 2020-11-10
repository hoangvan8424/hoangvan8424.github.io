<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProductDemo extends FormRequest
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
            'name'                  => 'required',
            'shopper'               => 'required',
            'receive_demo_date'     => 'required',
            'delivery_date_1'       => 'required',
            'delivery_date_2'       => 'required',
            'delivery_date_3'       => 'required',
            'delivery_date'         => 'required',
            'branch'                => 'required',
            'customer'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'Trường này không được để trống',
            'shopper.required'              => 'Trường này không được để trống',
            'receive_demo_date.required'    => 'Trường này không được để trống',
            'delivery_date_1.required'      => 'Trường này không được để trống',
            'delivery_date_2.required'      => 'Trường này không được để trống',
            'delivery_date_3.required'      => 'Trường này không được để trống',
            'delivery_date.required'        => 'Trường này không được để trống',
            'branch.required'               => 'Trường này không được bỏ trống',
            'customer.required'               => 'Trường này không được bỏ trống'
        ];
    }
}
