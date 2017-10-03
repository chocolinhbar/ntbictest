<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToChucRequest extends FormRequest
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
            'gioi_thieu_chung' => 'required',
            'vi_tri_chuc_nang' => 'required',
            'su_menh_tam_nhin' => 'required',
            'co_cau' => 'required',
            'doi_ngu_trung_tam' => 'required',
        ];
    }
     public function messages() {
        return [
            'gioi_thieu_chung.required' => 'Bạn cần nhập Giới thiệu chung',
            'vi_tri_chuc_nang.required' => 'Bạn cần nhập Vị trí, chức năng',
            'su_menh_tam_nhin.required' => 'Bạn cần nhập Sứ mệnh tầm nhìn',
            'co_cau.required' => 'Bạn cần nhập Cơ cấu',
            'doi_ngu_trung_tam.required' => 'Bạn cần nhập Đội ngũ trung tâm',
        ];
    }
}
