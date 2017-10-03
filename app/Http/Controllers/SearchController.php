<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TinTuc;
use App\SuKien;
use App\CongNghe;
use App\HinhSidebar;
use App\LogoDoitac;
use App\LoaiDoiTac;
use App\LoaiTin;

class SearchController extends Controller
{
    public function __construct()
	{
		$hinh_anh_sidebar = HinhSidebar::all();
		$logo_doi_tac = LogoDoitac::all();
		$loai_tin_list = LoaiTin::all();
	    $loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		
		view()->share('hinhanhsidebar',$hinh_anh_sidebar);
		view()->share('logodoitac',$logo_doi_tac);
		view()->share('loaitin', $loai_tin_list);
		view()->share('loaidoitac', $loai_doi_tac);
		view()->share('tinnoibat',$tin_noi_bat);
	}

    public function searchAll(Request $request) {
        $text_search = $request->text_search;
        $per_page = 3;

        if (!session()->has('language')) {
        session(['language'=>'vi']);
   		}
	    $locale = session()->get('language');
	    app()->setlocale($locale);

        $tin_tuc = DB::table('tin_tuc')->join('tin_tuc_translations','tin_tuc_translations.tin_tuc_id','=','tin_tuc.id')                    
                ->where('Ten','LIKE','%'.$text_search.'%')
                ->orWhere('TomTat','LIKE','%'.$text_search.'%')
                ->orWhere('NoiDung','LIKE','%'.$text_search.'%')->get();
        $tin_tuc = $tin_tuc->where('locale',$locale);
        $keys_tin_tuc = $tin_tuc->keyBy('id')->keys();
        $result_tin_tuc = DB::table('tin_tuc')->join('tin_tuc_translations','tin_tuc_translations.tin_tuc_id','=','tin_tuc.id')
                ->whereIn('tin_tuc_translations.id',$keys_tin_tuc)->paginate($per_page);
        
        $su_kien = DB::table('su_kien')->join('su_kien_translations','su_kien.id','=','su_kien_translations.su_kien_id')
					->where('NoiDung','<>','')
                    ->where('Ten','LIKE','%'.$text_search.'%')
                    ->orWhere('TomTat','LIKE','%'.$text_search.'%')
                    ->orWhere('NoiDung','LIKE','%'.$text_search.'%')->orderBy('su_kien.created_at','desc')->get();
		$su_kien = $su_kien->where('locale',$locale);
		$keys_su_kien = $su_kien->keyBy('id')->keys();
		$result_su_kien = DB::table('su_kien')->join('su_kien_translations','su_kien.id','=','su_kien_translations.su_kien_id')
					->whereIn('su_kien_translations.id',$keys_su_kien)->paginate($per_page);

        $cong_nghe = DB::table('cong_nghe')->join('cong_nghe_translations','cong_nghe_translations.cong_nghe_id','=','cong_nghe.id')
					->where('NoiDung','<>','')
                    ->where('Ten','LIKE','%'.$text_search.'%')
                    ->orWhere('NoiDung','LIKE','%'.$text_search.'%')
					->orderBy('cong_nghe.created_at','desc')->get();
		$cong_nghe = $cong_nghe->where('locale',$locale);
		$keys_cong_nghe = $cong_nghe->keyBy('id')->keys();
		$result_cong_nghe = DB::table('cong_nghe')->join('cong_nghe_translations','cong_nghe_translations.cong_nghe_id','=','cong_nghe.id')
					->whereIn('cong_nghe_translations.id',$keys_cong_nghe)->paginate($per_page);

        return view('pages.search_result.all')->with(['locale'=>$locale, 'tintuc'=>$result_tin_tuc, 'sukien'=>$result_su_kien, 'congnghe'=>$result_cong_nghe, 'text_search'=>$text_search]);
    }
}
