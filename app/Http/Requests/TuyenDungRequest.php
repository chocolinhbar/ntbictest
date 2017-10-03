<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class TuyenDungRequest extends FormRequest
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
            'mo_ta' => 'required',
            'noi_dung_tuyen_dung' => 'required',
            'ngay_bat_dau'=>'required',
            'ngay_ket_thuc'=>'required|after_or_equal:ngay_bat_dau',
        ];
    }
    public function messages() {
        return [
            'mo_ta.required' => 'Bạn cần nhập mô tả tuyển dụng',
            'noi_dung_tuyen_dung.required' => 'Bạn cần nhập nội dung tuyển dụng',
            'ngay_bat_dau.required'=>'Bạn cần nhập ngày bắt đầu tuyển dụng',
            'ngay_ket_thuc.required'=>'Bạn cần nhập ngày kết thúc tuyển dụng',
            'ngay_ket_thuc.after_or_equal'=>'Bạn cần nhập ngày kết thúc tuyển dụng lớn hơn hoặc bằng ngày bắt đầu',
        ];
    }
}