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
            'username'=>'required',
            'phone'=>'required|min:8',
            'address'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Vui lòng nhập username.',
            'phone.required'=>'Vui lòng nhập số điện thoại.',
            'phone.min'=>'Điện thoại sai định dạng.',
            'address.required'=>'Vui lòng nhập địa chỉ.'
        ];
    }
}
