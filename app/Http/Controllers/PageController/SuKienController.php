<?php

namespace App\Http\Controllers\PageController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use App\SuKien;
use App\LoaiDoiTac;
use App\TinTuc;
use App\LoaiTin;
use App\HinhSidebar;
use App\LogoDoitac;
use App\NguoiDangKiSuKien;
use App\Http\Requests\NguoiDangKiSuKienRequest;
use App\SuKienSlideshow;

class SuKienController extends Controller
{
	public function __construct()
	{
		$hinh_anh_sidebar = HinhSidebar::all();
		$logo_doi_tac = LogoDoitac::all();
		view()->share('hinhanhsidebar',$hinh_anh_sidebar);
		view()->share('logodoitac',$logo_doi_tac);
	}
    public function danhSachSuKien(Request $request){
		$text_search = $request->text_search;
		$per_page = 6;

		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $su_kien = DB::table('su_kien')->join('su_kien_translations','su_kien.id','=','su_kien_translations.su_kien_id')
					->where('NoiDung','<>','')
                    ->where('Ten','LIKE','%'.$text_search.'%')
                    ->orWhere('TomTat','LIKE','%'.$text_search.'%')
                    ->orWhere('NoiDung','LIKE','%'.$text_search.'%')->orderBy('su_kien.created_at','desc')->get();
		$su_kien = $su_kien->where('locale',$locale);
		$keys = $su_kien->keyBy('id')->keys();
		$result = DB::table('su_kien')->join('su_kien_translations','su_kien.id','=','su_kien_translations.su_kien_id')
					->whereIn('su_kien_translations.id',$keys)->paginate($per_page);


		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		$su_kien_noi_bat=SuKien::all()->where('status',1)->take(4);
		$su_kien_slideshow = SuKienSlideshow::all();
		$count_su_kien_slideshow = SuKienSlideshow::count();
		return view('pages.su_kien.danhsachsukien',['sukien'=>$result,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat,
											'text_search'=>$text_search,
											'sukiennoibat'=>$su_kien_noi_bat,
											'sukienslideshow' => $su_kien_slideshow,
											'countsukienslideshow' => $count_su_kien_slideshow]);
	}

	public function detailsSuKien($slug){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $su_kien=SuKien::where('slug',$slug)->first();
        $su_kien_sap_dien_ra = SuKien::orderBy('NgayBatDau','desc')->take(4)->get();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.su_kien.detailssukien',['sukien'=>$su_kien,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat,
											'sukiensapdienra'=>$su_kien_sap_dien_ra]);
	}

    public function NguoiDangKiSuKien($id,NguoiDangKiSuKienRequest $request){
        $nguoi=new NguoiDangKiSuKien;
        $nguoi->Ten=$request->ten;
        $nguoi->su_kien_id= $id;
        $nguoi->email=$request->email;
        $nguoi->phone=$request->phone;
		$nguoi->save();  
		
		return $nguoi->toJson();
    }
}
