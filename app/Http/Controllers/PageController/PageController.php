<?php
namespace App\Http\Controllers\PageController;

use App\TinTuc;
use App\LoaiTin;
use App\CauHoi;
use App\ToChuc;
use App\ToChucTranslation;
use App\TuyenDung;
use App\CongNghe;
use App\ChuyenGia;
use App\DoiTac;
use App\LoaiDoiTac;
use App\HinhSidebar;
use App\LogoDoitac;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


class PageController extends Controller
{
	public function __construct()
	{
		$hinh_anh_sidebar = HinhSidebar::all();
		$logo_doi_tac = LogoDoitac::all();
		view()->share('hinhanhsidebar',$hinh_anh_sidebar);
		view()->share('logodoitac',$logo_doi_tac);
	}
	public function TrangChu(){
		if (!session()->has('language')) {
             session(['language'=>'vi']);
        }
    	$locale = session()->get('language');
 		app()->setlocale($locale);

		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$doi_tac = DoiTac::take(4);
		$tin_tuc = TinTuc::all()->sortByDesc('created_at')->take(5);
		$doanh_nghiep = LoaiTin::where('slug','doanh-nghiep')->first();
		$khoi_nghiep = LoaiTin::where('slug','khoi-nghiep')->first();
		if(count($doanh_nghiep) > 0) {
			$tin_doanh_nghiep = TinTuc::all()->where('loai_tin_id',$doanh_nghiep->id)->take(5);
		}
		else $tin_doanh_nghiep = "";
		if (count($khoi_nghiep) > 0) {
			$tin_khoi_nghiep = TinTuc::all()->where('loai_tin_id',$khoi_nghiep->id)->take(5);
		}
		else $tin_khoi_nghiep = "";
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
 		return view('pages.trangchu', [ 'loaitin' => $loai_tin, 
										'locale'=>$locale, 
										'loaidoitac'=>$loai_doi_tac,
										'doitac'=>$doi_tac,
										'tinnoibat'=>$tin_noi_bat,
										'tintuc'=>$tin_tuc,
										'tin_khoi_nghiep'=>$tin_khoi_nghiep,
										'tin_doanh_nghiep'=>$tin_doanh_nghiep]);
	}

	// public function TinTuc(){

	// 	return view('pages.tintuc');
	// }

	// public function LienHe(){
	// 	if (!session()->has('language')) {
 //            session(['language'=>'vi']);
 //        }
 //        $locale = session()->get('language');
 //        app()->setlocale($locale);

	// 	$loai_tin = LoaiTin::all();
	// 	$loai_doi_tac = LoaiDoiTac::all();
	// 	return view('pages.lienhe', [ 'loaitin' => $loai_tin, 
	// 									'locale'=>$locale, 
	// 									'loaidoitac'=>$loai_doi_tac]);
	// }

	public function Detail(){
		return view('pages.details_tintuc');
	}
	public function Cauhoithuonggap(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $cau_hoi = CauHoi::paginate(10)->where('CauHoi','<>','');
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		return view('pages.to_chuc.cauhoithuonggap',['cauhoi'=>$cau_hoi,
													'loaitin' => $loai_tin, 
													'locale'=>$locale, 
													'loaidoitac'=>$loai_doi_tac]);
	}
	public function GioiThieuChung(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $to_chuc= ToChuc::first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(5);
		return view('pages.to_chuc.gioithieuchung',['tochuc'=>$to_chuc,
													'locale'=>$locale,
													'loaitin' => $loai_tin, 
													'loaidoitac'=>$loai_doi_tac,
													'tinnoibat'=>$tin_noi_bat]);
	}
	public function ViTriChucNang(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $to_chuc= ToChuc::first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.to_chuc.vitrichucnang',['tochuc'=>$to_chuc,
													'locale'=>$locale,
													'loaitin' => $loai_tin, 
													'loaidoitac'=>$loai_doi_tac,
													'tinnoibat'=>$tin_noi_bat]);
	}
	public function SuMenhTamNhin(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $to_chuc= ToChuc::first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.to_chuc.sumenhtamnhin',['tochuc'=>$to_chuc,
													'locale'=>$locale,
													'loaitin' => $loai_tin, 
													'loaidoitac'=>$loai_doi_tac,
													'tinnoibat'=>$tin_noi_bat]);
	}
	public function CoCau(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $to_chuc= ToChuc::first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.to_chuc.cocau',['tochuc'=>$to_chuc,
													'locale'=>$locale,
													'loaitin' => $loai_tin, 
													'loaidoitac'=>$loai_doi_tac,
													'tinnoibat'=>$tin_noi_bat]);
	}
	public function DoiNguTrungTam(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $to_chuc= ToChuc::first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.to_chuc.doingutrungtam',['tochuc'=>$to_chuc,
													'locale'=>$locale,
													'loaitin' => $loai_tin, 
													'loaidoitac'=>$loai_doi_tac,
													'tinnoibat'=>$tin_noi_bat]);
	}
	public function TuyenDung(){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $tuyen_dung= TuyenDung::orderBy('created_at','desc')->paginate(10)->where('NoiDungTuyenDung','<>','');
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.tuyen_dung.index',['tuyendung'=>$tuyen_dung,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat]);
	}
	public function DetailsTuyenDung($slug){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $tuyen_dung= TuyenDung::where('slug', $slug)->first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.tuyen_dung.show',['tuyendung'=>$tuyen_dung,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat]);
	}

	public function CongNghe(Request $request){
		$text_search = $request->text_search;
		$per_page = 10;
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);

		$cong_nghe = DB::table('cong_nghe')->join('cong_nghe_translations','cong_nghe_translations.cong_nghe_id','=','cong_nghe.id')
					->where('NoiDung','<>','')
                    ->where('Ten','LIKE','%'.$text_search.'%')
                    ->orWhere('NoiDung','LIKE','%'.$text_search.'%')
					->orderBy('cong_nghe.created_at','desc')->get();
		$cong_nghe = $cong_nghe->where('locale',$locale);
		$keys = $cong_nghe->keyBy('id')->keys();
		$result = DB::table('cong_nghe')->join('cong_nghe_translations','cong_nghe_translations.cong_nghe_id','=','cong_nghe.id')
					->whereIn('cong_nghe_translations.id',$keys)->paginate($per_page);

		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.cong_nghe.index',['congnghe'=>$result,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat,
											'text_search'=>$text_search]);
	}
	public function DetailsCongNghe($slug){
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $cong_nghe= CongNghe::where('slug', $slug)->first();
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.cong_nghe.show',['congnghe'=>$cong_nghe,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat]);
	}

	public function ChuyenGia() {
		if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);

		$chuyen_gia = ChuyenGia::paginate(10)->where('Ten','<>','');
		$loai_tin = LoaiTin::all();
		$loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
		return view('pages.chuyengia',['chuyengia'=>$chuyen_gia,
											'locale'=>$locale,
											'loaitin' => $loai_tin, 
											'loaidoitac'=>$loai_doi_tac,
											'tinnoibat'=>$tin_noi_bat]);
	}

}