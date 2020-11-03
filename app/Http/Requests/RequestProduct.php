<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'name' => 'required|string',
            'branch'    => 'required',
            'price'     => 'required|numeric|min:1',
            'quantity'  => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này là bắc buộc',
            'branch.required' => 'Trường này là bắc buộc',
            'price.required' => 'Trường này là bắc buộc',
            'quantity.required' => 'Trường này là bắc buộc',
            'name.string'   => 'Trường này không đúng định dạng',
        ];
    }
}
