<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class AuthorAddRequest extends FormRequest
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
            'name' => 'required|unique:author|min:3|max:100',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
            'name.max' => 'Tên danh mục nhiều nhất 100 kí tự',
            'name.min' => 'Tên danh mục ít nhất 3 kí tự',
            'status.required' => 'Tên trạng thái không được để trống'
        ];
    }
}
