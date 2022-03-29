<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|max:150',
            'upload' => 'mimes:jpg,jeg,png,gif,bmp',
            'price' => 'required|numeric|min:10',
            'sale_price' => 'required|numeric|min:0|lt:price',
            'category_id' => 'required',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không thể để trống.',
            'name.max' => 'Tên sản phẩm không quá 150 kí tự.',
            'price.required' => 'Giá sản phẩm không thể để trống.',
            'description.required' => 'vui lòng nhập thông tin mô tả.',
            'sale_price.required' => 'Vui lòng nhập giá khuyến mãi.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'status' => 'Trạng thái không thể để trống.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm tối thiểu 10$.',
            'sale_price.numeric' => 'Giá khuyến mãi phải là số.',
            'sale_price.min' => 'Giá khuyến mãi phải lớn hơn 0.',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá sản phẩm.',
            'upload.mimes' => 'Định dạng ảnh cho phép: jpg, jeg, png, gif, bmp.',
        ];
    }
}
