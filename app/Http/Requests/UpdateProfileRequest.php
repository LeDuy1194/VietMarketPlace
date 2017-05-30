<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'username'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'email'=>'required|email|unique:users'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Vui lòng nhập username.',
            'username.unique'=>'Nickname đã có người sử dụng.',
            'phone.required'=>'Vui lòng nhập số điện thoại.',
            'phone.unique'=>'Tài khoản đã tồn tại.',
            'email.required'=>'Vui lòng nhập email.',
            'email.unique'=>'Tài khoản đã tồn tại.'
        ];
    }
}
