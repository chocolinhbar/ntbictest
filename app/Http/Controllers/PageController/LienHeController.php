<?php

namespace App\Http\Controllers\PageController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LienHe;
use App\LoaiTin;
use App\LoaiDoiTac;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LienHeRequest;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
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
		$loai_doi_tac = LoaiDoiTac::all();
		return view('pages.lienhe', [ 'loaitin' => $loai_tin, 
										'locale'=>$locale, 
										'loaidoitac'=>$loai_doi_tac]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(LienHeRequest $request) {
        $lien_he = new LienHe;
        $lien_he->HoTen = $request->hoten;
        $lien_he->Email=$request->email;
        $lien_he->SoDienThoai=$request->sodienthoai;
        $lien_he->NoiDung=$request->message;
        $lien_he->save();
         return redirect::back()->with('message','Bạn đã gửi liên hệ thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
       //
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id) {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
      //
    }
}
