<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuKienRequest extends FormRequest
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
            'noi_dung' => 'required',
            // 'tom_tat' => 'required',
            'hinh_anh' => 'mimes:jpeg,bmp,png',
            'ngay_bat_dau' => 'required',
            'ngay_ket_thuc' => 'required|after_or_equal:ngay_bat_dau',
            'dia_chi' => 'required',
        ];
    }
     public function messages() {
        return [
            'ten.required' => 'Bạn cần nhập tên sự kiện',
            'noi_dung.required' => 'Bạn cần nhập nội dung sự kiện',
            // 'tom_tat.required' => 'Bạn cần nhập nội dung tóm tắt của sự kiện',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,bmp,png)',
            'ngay_bat_dau.required' => 'Bạn cần chọn ngày',
            'ngay_ket_thuc.required' => 'Bạn cần chọn ngày',
            'ngay_ket_thuc.after_or_equal' =>'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu',
            'dia_chi.required'=>'Bạn cần chọn địa chỉ diễn ra sự kiện'
        ];
    }
}
