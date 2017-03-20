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
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập Tên tài khoản',
            'email.required' => 'Vui lòng nhập Họ & Tên',
            'email.email' => 'Vui lòng nhập đúng Email',
            'email.unique' => 'Tài khoản đã tồn tại',
            'password.required' => 'Vui lòng nhập Mật khẩu'
        ];
    }
}
