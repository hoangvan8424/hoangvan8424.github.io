<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if(request()->is('admin/product/update/*')) {
            return [
                'name' => 'required|string|unique:products,name,'.$this->id,
                'category' => 'required',
                'price' => 'required|numeric|min:10000',
                'total_number' => 'required|numeric|min:1',
                'img_1' => 'mimes:jpeg,jpg,png|max:5000',
                'img_2' => 'mimes:jpeg,jpg,png|max:5000',
                'img_3' => 'mimes:jpeg,jpg,png|max:5000',
                'img_4' => 'mimes:jpeg,jpg,png|max:5000',
                'img_5' => 'mimes:jpeg,jpg,png|max:5000',
                'description' => 'required',
                'information' => 'required',
            ];
        }

        return [
            'name' => 'required|string|unique:products,name,'.$this->id,
            'category' => 'required',
            'price' => 'required|numeric|min:10000',
            'total_number' => 'required|numeric|min:1',
            'img_1' => 'required|mimes:jpeg,jpg,png|max:5000',
            'img_2' => 'required|mimes:jpeg,jpg,png|max:5000',
            'img_3' => 'mimes:jpeg,jpg,png|max:5000',
            'img_4' => 'mimes:jpeg,jpg,png|max:5000',
            'img_5' => 'mimes:jpeg,jpg,png|max:5000',
            'description' => 'required',
            'information' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được bỏ trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'category.required' => 'Trường này không được bỏ trống',
            'price.required' => 'Trường này không được bỏ trống',
            'price.numeric' => 'Giá không đúng định dạng',
            'price.min' => 'Giá phải lớn hơn 10000đ',
            'total_number.required' => 'Trường này không được bỏ trống',
            'total_number.numeric' => 'Không đúng định dạng số',
            'total_number.min' => 'Tổng số lượng phải lớn hơn 1',
            'img_1.required' => 'Trường này không được bỏ trống',
            'img_1.mimes' => 'File đã chọn không đúng định dạng ảnh',
            'img_1.max' => 'File đã chọn vượt quá kích thước cho phép (5MB)',
            'img_2.required' => 'Trường này không được bỏ trống',
            'img_2.mimes' => 'File đã chọn không đúng định dạng ảnh',
            'img_2.max' => 'File đã chọn vượt quá kích thước cho phép (5MB)',
            'img_3.required' => 'Trường này không được bỏ trống',
            'img_3.mimes' => 'File đã chọn không đúng định dạng ảnh',
            'img_3.max' => 'File đã chọn vượt quá kích thước cho phép (5MB)',
            'img_4.required' => 'Trường này không được bỏ trống',
            'img_4.mimes' => 'File đã chọn không đúng định dạng ảnh',
            'img_4.max' => 'File đã chọn vượt quá kích thước cho phép (5MB)',
            'img_5.required' => 'Trường này không được bỏ trống',
            'img_5.mimes' => 'File đã chọn không đúng định dạng ảnh',
            'img_5.max' => 'File đã chọn vượt quá kích thước cho phép (5MB)',
            'description.required' => 'Trường này không được bỏ trống',
            'information.required' => 'Trường này không được bỏ trống',
        ];
    }
}
