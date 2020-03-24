<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image' => 'File đã chọn không phải là ảnh',
            'mimes' => 'Hình ảnh vừa chọn không đúng định dạng ảnh (.jpg, .jpeg, .png, .gif, .svg)',
            'max' => 'Kích thước ảnh quá lớn (>2MB), hãy chọn ảnh có kích thước nhỏ hơn!',
        ];
    }
}
