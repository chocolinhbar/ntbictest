<?php
namespace App\Http\Controllers\PageController;

use App\DoiTac;
use App\LoaiDoiTac;
use App\TinTuc;
use App\LoaiTin;
use App\CauHoi;
use App\ToChuc;
use App\ToChucTranslation;
use App\TuyenDung;
use App\HinhSidebar;
use App\LogoDoitac;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Eloquent\Builder;


class DoiTacController extends Controller
{
	public function __construct()
	{
		$hinh_anh_sidebar = HinhSidebar::all();
		$logo_doi_tac = LogoDoitac::all();
		view()->share('hinhanhsidebar',$hinh_anh_sidebar);
		view()->share('logodoitac',$logo_doi_tac);
	}
	
	public function LoaiDoiTac($slug){
		if (!session()->has('language')) {
        	session(['language'=>'vi']);
   		}
	    $locale = session()->get('language');
	    app()->setlocale($locale);
		
	    
		$loai_tin_list = LoaiTin::all();
	    $loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(5);

		$ldt=LoaiDoiTac::where('slug',$slug)->first();
		$id_ldt=$ldt->id;
		
		$doi_tac=DoiTac::where('loai_doi_tac_id',$id_ldt)->get();
		
		 return view('pages.doi_tac.index', [	'loaitin' => $loai_tin_list, 
		 										'locale'=>$locale, 
												'loaidoitac'=>$loai_doi_tac,
												'tinnoibat'=>$tin_noi_bat,
												'ldt'=>$ldt,
												'doitac'=>$doi_tac]);
	}
	public function detailsDoiTac($slug_ldt,$slug_dt){
		if (!session()->has('language')) {
        	session(['language'=>'vi']);
   		}
	    $locale = session()->get('language');
	    app()->setlocale($locale);
		
	    
		$loai_tin_list = LoaiTin::all();
	    $loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(5);

		$ldt=LoaiDoiTac::where('slug',$slug_ldt)->first();
		
		
		$doi_tac=DoiTac::where('slug',$slug_dt)->first();
		
		 return view('pages.doi_tac.detailsDoiTac', [	'loaitin' => $loai_tin_list, 
		 										'locale'=>$locale, 
												'loaidoitac'=>$loai_doi_tac,
												'tinnoibat'=>$tin_noi_bat,
												'ldt'=>$ldt,
												'doitac'=>$doi_tac]);
	}
}