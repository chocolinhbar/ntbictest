<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HinhAnhSidebar extends FormRequest
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
            'link' => 'required',
            'hinh_anh' => 'mimes:jpeg,bmp,png',
        ];
    }

    public function messages() {
        return [
            'link.required' => 'Bạn cần nhập link trang web',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,bmp,png)',
        ];
    }
}
