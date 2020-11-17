<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories,name,'.$this->id,
            'slug' => 'string|unique:categories,slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.string'   => 'Tên không đúng định dạng',
            'name.unique'   => 'Tên danh mục đã tồn tại',
            'slug.string'   => 'Slug không đúng định dạng',
            'slug.unique'   => 'Slug đã tồn tại',

        ];
    }
}
