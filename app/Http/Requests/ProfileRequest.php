<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ProfileRequest extends FormRequest
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
            'curpassword' => 'required',
            'newpassword' => 'required'

        ];

    }
    public function messages() {
        return [
            'curpassword.required' => 'Please enter current password',
            'newpassword.required' => 'Please enter password',
        ];
    }
}
