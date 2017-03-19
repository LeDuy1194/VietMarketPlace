<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'sltParent'=>'required',
            'txtName'=>'required',
            'fImages'=>'required|image'
        ];
    }

    public function messages () {
        return [
            'sltParent.required'=>'Vui lòng chọn category',
            'txtName.required'=>'Vui lòng nhập tên sản phẩm',
            'fImages.required'=>'Vui lòng chọn ảnh sản phẩm',
            'fImages.image'=>'Đây không phải là hình ảnh'
        ];
    }
}
