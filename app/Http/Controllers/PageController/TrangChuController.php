<?php
namespace App\Http\Controllers\PageController;

use App\TinTuc;
use App\LoaiTin;
use App\CauHoi;
use App\ToChuc;
use App\ToChucTranslation;
use App\TuyenDung;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LoaiDoiTac;
use App\DoiTac;


class TrangChuController extends Controller
{
	public function TrangChu(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);

		$loai_tin=LoaiTin::all();
		return view('pages.trangchu',['loaitin'=>$loai_tin,'locale'=>$locale]);
	}

}