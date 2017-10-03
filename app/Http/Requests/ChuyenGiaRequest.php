<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChuyenGiaRequest extends FormRequest
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
    public function rules(){
        return [
            'ten' => 'required',
            'chuc_vu' => 'required',
            'hinh_anh' => 'mimes:jpeg,bmp,png',
        ];
    }
     public function messages() {
        return [
            'ten.required' => 'Bạn cần nhập tên chuyên gia',
            'chuc_vu.required' => 'Bạn cần nhập chức vụ chuyên gia',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,bmp,png)',
        ];
    }
}
