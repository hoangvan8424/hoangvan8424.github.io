<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDepartment extends FormRequest
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
            'name' => 'required|string|unique:departments',
            'branch' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống',
            'branch.required' => 'Trường này không được để trống',
            'name.unique'     =>'Tên phòng ban đã tồn tại',
            'name.string'   => 'Trường này không đúng định dạng',
        ];
    }
}
