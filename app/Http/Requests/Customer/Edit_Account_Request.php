<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class Edit_Account_Request extends FormRequest
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
            'name' => 'required|max:100',
            'phone' => 'required|numeric',
            'address' => 'required|max:100',
            'gender' => 'required',
            'password' => 'max:100',
            'confirm_password' => 'max:100|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.max' => 'Tên người dùng giới hạn 100 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.numeric' => 'Số điện thoại phải chữ số',
            'address.max' => 'Địa chỉ giới hạn 100 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'gender.required' => 'Giới tính không được để trống',
            'password.max' => 'Mật khẩu giới hạn 100 ký tự',
            'confirm_password.max' => 'Mật khẩu xác nhận giới hạn 100 ký tự',
            'confirm_password.same' => 'Mật khẩu xác nhận không giống nhau',
        ];
    }
}
