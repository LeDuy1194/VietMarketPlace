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
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'fullname' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập Tên tài khoản',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Vui lòng nhập đúng định dạng Email',
            'email.unique' => 'Tài khoản đã tồn tại',
            'password.required' => 'Vui lòng nhập Mật khẩu',
            'address.required' => 'Vui lòng nhập Địa chỉ liên hệ',
            'phone.required' => 'Vui lòng nhập Số điện thoại',
            'fullname.required' => 'Vui lòng nhập Họ và tên',
        ];
    }
}
