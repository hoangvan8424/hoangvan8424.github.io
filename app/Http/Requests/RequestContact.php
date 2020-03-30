<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
            'name' => 'required',
            'email' => 'required|string|email|max:255',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email không đúng định dạng.',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'message.required' => 'Tin nhắn không được để trống.'
        ];
    }
}
