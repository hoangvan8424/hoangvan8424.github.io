<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTransaction extends FormRequest
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
            'address' => 'required',
            'email' => 'string|email|max:255',
            'name' => 'string',
            'phone'   => 'required|regex:/(0)[0-9]{8}/'
        ];
    }

    public function messages()
    {
        return [
            'email.string' => 'Email không đúng định dạng.',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'name.string' => 'Họ tên không hợp lệ!',
            'address.required' => 'Địa chỉ không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.regex' => 'Số điện thoại không đúng định dạng.'

        ];
    }
}
