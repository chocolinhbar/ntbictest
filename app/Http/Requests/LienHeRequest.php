<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LienHeRequest extends FormRequest
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
            'hoten'=>'required',
            'email'=>'required|email',
            'sodienthoai'=>'required',
            'message'=>'required',
        ];
    }
    public function messages(){
        return[
            'hoten.required'=>'Bạn cần nhập họ tên',
            'email.required'=>'Bạn cần nhập email',
            'email.email'=>'Bạn cần nhập đúng định dạng email',
            'sodienthoai.required'=>'Bạn cần nhập số điện thoại',
            'message.required'=>"Bạn cần nhập nội dụng liên hệ",
        ];
    }
}
