<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestInstall extends FormRequest
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
            'name' => 'required|string|max:160',
            'email' => 'required|string|email|max:160',
            'password' => 'required|string|min:6|confirmed',
            'site_name' => 'required|min:3|max:160',
            'site_slogan' => 'required|min:3|max:160',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này là bắt buộc',
            'email.required' => 'Trường này là bắt buộc',
            'password.required' => 'Trường này là bắt buộc',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'site_name.required' => 'Trường này là bắt buộc',
            'site_slogan.required' => 'Trường này là bắt buộc',
        ];
    }
}
