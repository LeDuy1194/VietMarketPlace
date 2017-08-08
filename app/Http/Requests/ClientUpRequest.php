<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpRequest extends FormRequest
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
            'itemname' => 'required:stocks,name',
            'price' => 'required',
            //'status' => 'required',
            'discription' => 'required',
            'address' => 'required'
            //'img' => '',
            //'user_id' => '',
            //'cate_id' => ''
        ];
    }
    public function messages()
    {
        return [
            'itemname.required' => 'Vui lòng nhập tên Sản phẩm',
            'price.required' => 'Vui lòng nhập giá Sản phẩm',
            'discription.required' => 'Vui lòng không để trống phần mô tả',
            'address.required' => 'Vui lòng nhập địa chỉ'
        ];
    }
}
