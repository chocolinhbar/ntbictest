<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ToChuc;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ToChucRequest;
use File;
use Auth;

class ToChucController extends Controller
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
        $to_chuc = ToChuc::paginate(10);
         $count= DB::table('to_chuc')->count();
        return view('admin.manager_data.to_chuc.index',['tochuc' => $to_chuc, 'count'=>$count,'locale'=>$locale]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $count= DB::table('to_chuc')->count();
        if($count == 0){
            if (!session()->has('language')) {
                session(['language'=>'vi']);
            }
            $locale = session()->get('language');
            return view('admin.manager_data.to_chuc.create',['locale'=>$locale]);
        }
        if($count >=1){
            echo "Bạn đã khỏi tạo thông tin tổ chức.(Chỉ được 1 lần tạo)";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ToChucRequest $request) {
        app()->setlocale($request->locale);
        $to_chuc = new ToChuc;
        $to_chuc->slug="ntbic";
        $to_chuc->GioiThieuChung = $request->gioi_thieu_chung;
        $to_chuc->ViTriChucNang=$request->vi_tri_chuc_nang;
        $to_chuc->SuMenhTamNhin=$request->su_menh_tam_nhin;
        $to_chuc->CoCau=$request->co_cau;
        $to_chuc->DoiNguTrungTam=$request->doi_ngu_trung_tam;
        $to_chuc->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.to-chuc.index')->with('message','Bạn đã tạo thành công thông tin tổ chức');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('to-chuc.index')->with('message','Bạn đã tạo thành công thông tin tổ chức');
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
        $to_chuc = ToChuc::find($id);
        return view('admin.manager_data.to_chuc.edit', ['tochuc' => $to_chuc, 'locale'=>$locale]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ToChucRequest $request,$id) {
        app()->setlocale($request->locale);
        $to_chuc = ToChuc::find($id);
        $to_chuc->GioiThieuChung = $request->gioi_thieu_chung;
        $to_chuc->ViTriChucNang=$request->vi_tri_chuc_nang;
        $to_chuc->SuMenhTamNhin=$request->su_menh_tam_nhin;
        $to_chuc->CoCau=$request->co_cau;
        $to_chuc->DoiNguTrungTam=$request->doi_ngu_trung_tam;
        $to_chuc->save();

        return Redirect::back()->with('message', 'Bạn đã sửa thông tin tổ chức thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
       
    }
}
