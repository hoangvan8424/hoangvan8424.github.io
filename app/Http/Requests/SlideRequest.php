<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
        if(request()->is('admin/slide/update/*')) {
            return [
                'name' => 'required',
                'title' => 'required',
                'image' => 'mimes:jpeg,jpg,png|max:5000',
            ];
        }
        return [
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Trường này không được bỏ trống',
            'name.required' => 'Trường này không được bỏ trống',
            'title.required' => 'Trường này không được bỏ trống',
            'image.mimes' => 'File đã chọn không đúng định dạng ảnh',
            'image.max' => 'File đã chọn vượt quá kích thước cho phép (5MB)',
        ];
    }
}
