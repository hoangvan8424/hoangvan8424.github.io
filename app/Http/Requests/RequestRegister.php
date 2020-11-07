<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'branch'   => 'required',
            'department'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống',
            'branch.required' => 'Trường này không được để trống',
            'department.required' => 'Trường này không được để trống',
            'name.string'   => 'Không đúng định dạng tên',
            'name.max'      => 'Tên không được vượt quá 255 ký tự',
            'email.required'    => 'Trường này không được để trống',
            'email.string'      => 'Không đúng định dạng email',
            'email.email'      => 'Không đúng định dạng email',
            'email.max'      => 'Email không được vượt quá 255 ký tự',
            'email.unique'      => 'Email đã tồn tại',
            'password.required'    => 'Trường này không được để trống',
            'password.string'      => 'Không đúng định dạng',
            'password.min'      => 'Mật khẩu quá yếu',
            'password.confirmed'      => 'Mật khẩu nhập lại không trùng khớp',
        ];
    }
}
