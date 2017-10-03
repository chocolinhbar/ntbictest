<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuKienSlideshowRequest extends FormRequest
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
            'hinh_anh' => 'mimes:jpeg,bmp,png',
        ];
    }

    public function messages() {
        return [
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,bmp,png)',
        ];
    }
}
