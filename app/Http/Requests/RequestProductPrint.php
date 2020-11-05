<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProductPrint extends FormRequest
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
            'date_selected_code'    => 'required',
            'review_date_1'         => 'required',
            'review_date_2'         => 'required',
            'review_date_3'         => 'required',
            'closing_date'          => 'required',
            'date_in_branch'        => 'required',
            'receive_date'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'Trường này không được để trống',
            'shopper.required'              => 'Trường này không được để trống',
            'date_selected_code.required'   => 'Trường này không được để trống',
            'review_date_1.required'        => 'Trường này không được để trống',
            'review_date_2.required'        => 'Trường này không được để trống',
            'review_date_3.required'        => 'Trường này không được để trống',
            'closing_date.required'         => 'Trường này không được để trống',
            'date_in_branch.required'       => 'Trường này không được để trống',
            'receive_date.required'         => 'Trường này không được để trống',
        ];
    }
}
