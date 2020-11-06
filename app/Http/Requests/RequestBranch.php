<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBranch extends FormRequest
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
            'name'      => 'required|string|unique:branchs',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Trường này là bắt buộc',
            'name.string'       => 'Trường này không đúng định dạng',
            'name.unique'       => 'Tên chi nhánh đã tồn tại',
        ];
    }
}
