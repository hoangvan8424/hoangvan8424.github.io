<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name' => 'required',
            'pro_price' => 'required',
            'pro_category_id' => 'required',
            'pro_avatar' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pro_description' => 'required',
            'pro_content' => 'required',
            'brand_id'  => 'required'

        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'pro_name.required' => 'Tên sản phẩm không được để trống.',
//            'pro_name.unique' => 'Tên sản phẩm đã tồn tại.',
            'pro_price.required' => 'Giá sản phẩm không được để trống.',
            'pro_category_id.required' => 'Danh mục sản phẩm không được để trống.',
//            'pro_avatar.required' => 'Hình ảnh không được để trống',
            'pro_avatar.image' => 'File đã chọn không phải là ảnh',
            'pro_avatar.mimes' => 'Hình ảnh vừa chọn không đúng định dạng ảnh (.jpg, .jpeg, .png, .gif, .svg)',
            'pro_avatar.max' => 'Kích thước ảnh >2MB',
            'pro_description.required' => 'Mô tả không được để trống.',
            'pro_content.required' => 'Nội dung không được để trống',
            'brand_id.required' => 'Thương hiệu không được để trống!'
        ];
    }
}
