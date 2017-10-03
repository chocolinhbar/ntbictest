<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\SuKien;
use App\SuKienTranslation;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SuKienRequest;
use File;
use App\User;
use Auth;
use App\NguoiDangKiSuKien;

class SuKienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (!session()->has('language')) {
            session(['language'=>'vi']);
        }

        $locale = session()->get('language');
        app()->setlocale($locale);
        if(Auth::user()->level == 1) {
            $su_kien = SuKien::paginate(10);
        } elseif (Auth::user()->level == 2) {
            $su_kien = SuKien::where('users_id', Auth::user()->id)->paginate(10);
        } 
        return view('admin.manager_data.su_kien.index',['sukien' => $su_kien, 'locale'=>$locale]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $su_kien = SuKien::all();
        return view('admin.manager_data.su_kien.create',['sukien' => $su_kien, 'locale'=>$locale]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuKienRequest $request)
    {
        app()->setlocale($request->locale);
        $su_kien = new SuKien;
        $su_kien ->users_id = Auth::guard('web')->user()->id;
        $su_kien->Ten = $request->ten;
        $su_kien->slug= changeTitle($request->ten);
        $su_kien->NoiDung = $request->noi_dung;
        // $su_kien->TomTat = $request->tom_tat;
        $su_kien->DiaChi = $request->dia_chi;
        $su_kien->status = $request->status;
        $su_kien->NgayBatDau = date('Y-m-d', strtotime($request->ngay_bat_dau));
        $su_kien->NgayKetThuc = date('Y-m-d', strtotime($request->ngay_ket_thuc));
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/su_kien/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/su_kien",$hinh_anh);
            $su_kien->HinhAnh = "assets/upload/su_kien/".$hinh_anh;
        }
        else{
            $su_kien->HinhAnh = "";
        }
        $su_kien->save();
       return redirect()->route('su-kien.index')->with('message','Bạn đã thêm sự kiện thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nguoi_dang_ky = NguoiDangKiSuKien::where('su_kien_id',$id)->paginate(10);
        return view('admin.manager_data.su_kien.show',['dangky' => $nguoi_dang_ky]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!session()->has('language')) {
            session(['language'=>'vi']);
        }
        $locale = session()->get('language');
        app()->setlocale($locale);
        $su_kien = SuKien::find($id);
        return view('admin.manager_data.su_kien.edit', ['sukien' => $su_kien, 'locale'=>$locale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuKienRequest $request, $id)
    {
        app()->setlocale($request->locale);
        $su_kien = SuKien::find($id);
        $su_kien->Ten = $request->ten;
        $su_kien->slug = changeTitle($request->ten);
        $su_kien->NoiDung = $request->noi_dung;
        // $su_kien->TomTat = $request->tom_tat;
        $su_kien->DiaChi = $request->dia_chi;
        $su_kien->status = $request->status;
        $su_kien->NgayBatDau = date('Y-m-d', strtotime($request->ngay_bat_dau));
        $su_kien->NgayKetThuc = date('Y-m-d', strtotime($request->ngay_ket_thuc));
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/su_kien/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/su_kien/",$hinh_anh);
            $su_kien->HinhAnh = "assets/upload/su_kien/".$hinh_anh;
        }
        if($request->delete_logo == "delete" && $su_kien->HinhAnh != ""){
           $str = substr($su_kien->HinhAnh, 0);
          
             File::delete($str);
           $su_kien->HinhAnh = "";
           
       }
        $su_kien->save();
       return redirect::back()->with('message','Bạn đã sửa sự kiện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $su_kien = SuKien::find($id);
        $su_kien->delete();
        return $su_kien->toJson();
    }
}
