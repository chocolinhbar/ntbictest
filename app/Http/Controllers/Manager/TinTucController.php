<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\TinTuc;
use App\LoaiTin;
use Auth;
use Illuminate\Support\Facades\Redirect;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (!session()->has('language')) {
            session(['language'=>'vi']);
        }

        $locale = session()->get('language');
        app()->setlocale($locale);
        if(Auth::user()->level == 1) {
            $tin_tuc = TinTuc::paginate(10);
        } elseif (Auth::user()->level == 2) {
            $tin_tuc = TinTuc::where('users_id', Auth::user()->id)->paginate(10);
        }        
        return view('admin.manager_data.tin_tuc.index',['tintuc' => $tin_tuc, 'locale'=>$locale]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (!session()->has('language')) {
            session(['language'=>'vi']);
        }

        $locale = session()->get('language');
        app()->setlocale($locale);
        $loai_tin = LoaiTin::all();
        return view('admin.manager_data.tin_tuc.create', ['loaitin' => $loai_tin,'locale'=>$locale]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request,
        [
            'ten' => 'required|unique:tin_tuc_translations,Ten',
            'noi_dung' => 'required',
            'tom_tat' => 'required',
            'hinh_anh' => 'image|mimes:jpeg,bmp,png,jpg'
        ],
        [
            'ten.required' => 'Bạn cần nhập tên tin tức',
            'ten.unique' => 'Tên tin tức đã được dùng',
            'noi_dung.required' => 'Bạn cần nhập nội dung tin tức',
            'tom_tat.required' => 'Bạn cần nhập nội dung tóm tắt của tin tức',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,bmp,png,jpg)',
            'hinh_anh.image' => 'Bạn chỉ được chọn 1 file ảnh'
        ]);

        app()->setlocale($request->locale);
        $tin_tuc = new TinTuc;
        $tin_tuc->Ten = $request->ten;
        $tin_tuc->NoiDung = $request->noi_dung;
        $tin_tuc->TomTat = $request->tom_tat;
        $tin_tuc->loai_tin_id = $request->loai_tin;
        $tin_tuc->slug = changeTitle($request->ten);
        $tin_tuc->status = $request->status;
        $tin_tuc->users_id = Auth::user()->id;

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/tin_tuc/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/tin_tuc",$hinh_anh);
            $tin_tuc->HinhAnh = $hinh_anh;
        }
        else{
            $tin_tuc->HinhAnh = "";
        }

        $tin_tuc->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.tin-tuc.index')->with('message','Bạn đã thêm tin tức thành công');
        } elseif (Auth::user()->level == 2) {
    	    return redirect()->route('tin-tuc.index')->with('message','Bạn đã thêm tin tức thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        if (!session()->has('language')) {
            session(['language'=>'vi']);
        }

        $locale = session()->get('language');
        app()->setlocale($locale);
        $loai_tin = LoaiTin::all();
        $tin_tuc = TinTuc::find($id);
        return view('admin.manager_data.tin_tuc.edit', ['loaitin' => $loai_tin, 'tintuc' => $tin_tuc,'locale'=>$locale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $this->validate($request,
        [
            'ten' => 'required',
            'noi_dung' => 'required',
            'tom_tat' => 'required',
            'hinh_anh' => 'image|mimes:jpeg,bmp,png,jpg'
        ],
        [
            'ten.required' => 'Bạn cần nhập tên tin tức',
            'noi_dung.required' => 'Bạn cần nhập nội dung tin tức',
            'tom_tat.required' => 'Bạn cần nhập nội dung tóm tắt của tin tức',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,bmp,png)',
            'hinh_anh.image' => 'Bạn chỉ được chọn 1 file ảnh'
        ]);

        app()->setlocale($request->locale);
        $tin_tuc = TinTuc::find($id);

        $tin_tuc->Ten = $request->ten;
        $tin_tuc->NoiDung = $request->noi_dung;
        $tin_tuc->TomTat = $request->tom_tat;
        $tin_tuc->loai_tin_id = $request->loai_tin;
        $tin_tuc->slug = changeTitle($request->ten);
        $tin_tuc->status = $request->status;

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/tin_tuc/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/tin_tuc/",$hinh_anh);
            $tin_tuc->HinhAnh = $hinh_anh;
        }
        if($request->delete_logo == "delete" && $tin_tuc->HinhAnh != ""){
           $str = substr($tin_tuc->HinhAnh, 0);
          
             File::delete($str);
           $tin_tuc->HinhAnh = "";
           
       }

        $tin_tuc->save();
        return Redirect::back()->with('message', 'Bạn đã sửa tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $tin_tuc = TinTuc::find($id);
        $tin_tuc->delete();
        return $tin_tuc->toJson();
    }
}
