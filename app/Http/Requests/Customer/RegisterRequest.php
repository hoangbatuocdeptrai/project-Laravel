<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|max:100|email|unique:customer,email,'.request()->id,
            'phone' => 'required|numeric|unique:customer,phone,'.request()->id,
            'address' => 'required|max:100',
            'gender' => 'required',
            'password' => 'required|max:100',
            'confirm_password' => 'required|max:100|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.max' => 'Tên người dùng giới hạn 100 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email giới hạn 100 ký tự',
            'email.email' => 'Email phải là định dạng Email',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.numeric' => 'Số điện thoại phải chữ số',
            'address.max' => 'Địa chỉ giới hạn 100 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'gender.required' => 'Giới tính không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.max' => 'Mật khẩu giới hạn 100 ký tự',
            'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
            'confirm_password.max' => 'Mật khẩu xác nhận giới hạn 100 ký tự',
            'confirm_password.same' => 'Mật khẩu xác nhận không giống nhau',
        ];
    }
}
