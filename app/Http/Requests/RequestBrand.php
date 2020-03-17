<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBrand extends FormRequest
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
            'brand_name' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên thương hiệu không được để trống!',
//            'brand_name.unique' => 'Tên thương hiệu đã tồn tại!',
            'category_id.required' => 'Danh mục sản phẩm không được để trống'
        ];
    }
}
