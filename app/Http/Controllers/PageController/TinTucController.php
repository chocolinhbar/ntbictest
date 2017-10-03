<?php
namespace App\Http\Controllers\PageController;

use App\TinTuc;
use App\LoaiTin;
use App\CauHoi;
use App\ToChuc;
use App\ToChucTranslation;
use App\TuyenDung;
use App\LoaiDoiTac;
use App\HinhSidebar;
use App\LogoDoitac;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class TinTucController extends Controller
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

	public function allNews(Request $request){
		$text_search = $request->text_search;
		$per_page = 10;

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
		$keys = $tin_tuc->keyBy('id')->keys();
		$result = DB::table('tin_tuc')->join('tin_tuc_translations','tin_tuc_translations.tin_tuc_id','=','tin_tuc.id')
					->whereIn('tin_tuc_translations.id',$keys)->paginate($per_page);
		return view('pages.tin_tuc.allNews',['tintuc'=>$result, 'locale'=>$locale, 'text_search'=>$text_search]);
	}
	public function newsOfKind($slug){
		if (!session()->has('language')) {
        	session(['language'=>'vi']);
   		}
	    $locale = session()->get('language');
	    app()->setlocale($locale);
		
	    $loai_tin=LoaiTin::where('slug',$slug)->first();
	    $id=$loai_tin->id;
	    $tin_tuc= TinTuc::orderBy('created_at','desc')->where('loai_tin_id',$id)->paginate(10);
		$loai_tin_list = LoaiTin::all();
	    $loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
 		return view('pages.tin_tuc.news', [ 'tintuc' => $tin_tuc,
		 											'lt' => $loai_tin, 
													'locale'=>$locale]);
	}

	public function getTinNoiBat() {
		if (!session()->has('language')) {
        session(['language'=>'vi']);
   		}
	    $locale = session()->get('language');
	    app()->setlocale($locale);

		$tin_tuc=TinTuc::orderBy('created_at','desc')->where('status',1)->paginate(10);
		return view('pages.tin_tuc.allNews',['tintuc'=>$tin_tuc, 'locale'=>$locale]);
	}

	public function detailsNew($slug_loai_tin,$slug_tin_tuc){
		if (!session()->has('language')) {
        session(['language'=>'vi']);
   		 }
	    $locale = session()->get('language');
	    app()->setlocale($locale);
	    //take id loại tin, tên loại tin
	     $loai_tin=LoaiTin::where('slug',$slug_loai_tin)->first();
	     $id=$loai_tin->id;
	     $lt=$loai_tin->slug;
	     $tenlt=$loai_tin->Ten;
	  
	    $count= DB::table('to_chuc')->count();
	   // echo $tin_lien_quan;
	   //lấy tin để show ra chi tiếts
        $tin_tuc=TinTuc::where('slug',$slug_tin_tuc)->first();
         //lấy các tin cùng lĩnh vực
        $tin_lien_quan=TinTuc::where([['loai_tin_id',$id],['id','<>',$tin_tuc->id]])->get();
		$loai_tin_list = LoaiTin::all();
	    $loai_doi_tac = LoaiDoiTac::all();
		$tin_noi_bat = TinTuc::all()->where('status',1)->take(4);
  	   return view('pages.tin_tuc.show',['tintuc'=>$tin_tuc,
										'tinlienquan'=>$tin_lien_quan,
										'locale'=>$locale, 
										'lt'=>$lt,
										'tenlt'=>$tenlt]);  	    
	}
	
}