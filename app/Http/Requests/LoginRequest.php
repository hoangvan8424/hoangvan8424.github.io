<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'     => 'required|string|email|max:255',
            'password'  => 'required|min:6|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.string' => 'Không đúng định dạng email',
            'email.email' => 'Không đúng định dạng email',
            'email.max' => 'Email vượt quá độ dài tối đa',
            'password.unique' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải dài tối thiểu 6 ký tự'
        ];
    }
}
