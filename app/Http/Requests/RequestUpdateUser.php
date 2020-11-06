<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateUser extends FormRequest
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
            'name' => 'required|string|max:255',
            'branch'    => 'required',
            'department'    => 'required',
            'date_of_birth' => 'required|date_format:d-m-Y|date|before:today',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống',
            'name.string'   => 'Không đúng định dạng tên',
            'name.max'      => 'Tên không được vượt quá 255 ký tự',
            'branch.required'   => 'Trường này không được để trống',
            'department.required'   => 'Trường này không được để trống',
            'date_of_birth.required'   => 'Trường này không được để trống',
            'date_of_birth.date_format'   => 'Không đúng định dạng (dd-mm-yyyy)',
            'date_of_birth.date'   => 'Không đúng định dạng (dd-mm-yyyy)',
            'date_of_birth.before'   => 'Trường này không hợp lệ',
        ];
    }
}
