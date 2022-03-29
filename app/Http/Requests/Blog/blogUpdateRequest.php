<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'news' => 'required',
            'image' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên Không được để trống',
            'news.required' => 'Tin tức không được để trống',
            'image.required' => 'Ảnh không được để trống'
        ];
    }
}
