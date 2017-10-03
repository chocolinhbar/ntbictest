<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDangKiSuKienRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }
     public function messages() {
        return [
            'ten.required' => 'Bạn cần nhập tên',
            'email.required' => 'Bạn cần nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            // 'email.unique'=>'Email đã tồn tại',
            'phone.required' => 'Bạn cần nhập số điện thoại',
            // 'phone.unique'=>'Số điện thoại đã tồn tại',
        ];
    }
}
