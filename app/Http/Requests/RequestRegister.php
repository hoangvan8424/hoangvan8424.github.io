<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>  [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            're_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải bắt đầu bằng ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email không hợp lệ.',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.string' => 'Mật khẩu không hợp lệ.',
            'password.regex' => 'Mật khẩu không hợp lệ (Mật khẩu phải chứa ký tự in hoa, số, hoặc ký tự đặc biệt).',
            'password.min' => 'Mật khẩu phải dài ít nhất 8 ký tự.',
            'password.same' => 'Nhập lại mật khẩu và mật khẩu không trùng nhau.',

            're_password.required' => 'Nhập lại mật khẩu không được để trống.',
            're_password.same' => 'Nhập lại mật khẩu và mật khẩu không trùng nhau.',

        ];
    }

}
