<?php

namespace App\Http\Requests;

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
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'address' => 'required',
            'phone' => 'required|unique:users',
            'fullname' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập Tên tài khoản',
            'username.unique' => 'Tài khoản đã tồn tại',
            'username.min' => 'Tài khoản phải trên 6 ký tự',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Vui lòng nhập đúng định dạng Email',
            'email.unique' => 'Tài khoản đã tồn tại',
            'password.required' => 'Vui lòng nhập Mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'address.required' => 'Vui lòng nhập Địa chỉ liên hệ',
            'phone.required' => 'Vui lòng nhập Số điện thoại',
            'phone.unique' => 'Tài khoản đã tồn tại',
            'fullname.required' => 'Vui lòng nhập Họ và tên',
        ];
    }
}
