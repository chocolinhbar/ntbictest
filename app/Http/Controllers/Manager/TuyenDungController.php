<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\TuyenDung;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TuyenDungRequest;

class TuyendungController extends Controller
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
        $tuyen_dung= TuyenDung::paginate(1);
        return view('admin.manager_data.tuyen_dung.index',['tuyendung' => $tuyen_dung, 'locale'=>$locale]);
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
        return view('admin.manager_data.tuyen_dung.create',['locale'=>$locale]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TuyenDungRequest $request) {
        app()->setlocale($request->locale);
        $tuyen_dung = new TuyenDung;
        $tuyen_dung->MoTa = $request->mo_ta;
        $tuyen_dung->Slug = changeTitle($request->mo_ta);
        $tuyen_dung->NoiDungTuyenDung = $request->noi_dung_tuyen_dung;
        $tuyen_dung->NgayBatDau=date('Y-m-d', strtotime($request->ngay_bat_dau));
        $tuyen_dung->NgayKetThuc=date('Y-m-d', strtotime($request->ngay_ket_thuc));
        $tuyen_dung->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.tuyen-dung.index')->with('message','Bạn đã thêm câu hỏi thường gặp thành công');
        } elseif (Auth::user()->level == 2) {
    	    return redirect()->route('tuyen-dung.index')->with('message','Bạn đã thêm câu hỏi thường gặp thành công');
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
        $tuyen_dung = TuyenDung::find($id);
        return view('admin.manager_data.tuyen_dung.edit', ['tuyendung' => $tuyen_dung, 'locale'=>$locale]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(TuyenDungRequest $request,$id) {
        app()->setlocale($request->locale);
        $tuyen_dung = TuyenDung::find($id);
        $tuyen_dung->MoTa = $request->mo_ta;
        $tuyen_dung->Slug = changeTitle($request->mo_ta);
        $tuyen_dung->NoiDungTuyenDung = $request->noi_dung_tuyen_dung;
        $tuyen_dung->NgayBatDau=date('Y-m-d', strtotime($request->ngay_bat_dau));
        $tuyen_dung->NgayKetThuc=date('Y-m-d', strtotime($request->ngay_ket_thuc));
        $tuyen_dung->save();

        return Redirect::back()->with('message', 'Bạn đã sửa câu hỏi thường gặp thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $tuyen_dung = TuyenDung::find($id);
        $tuyen_dung->delete();
        return $tuyen_dung->toJson();
    }
}
