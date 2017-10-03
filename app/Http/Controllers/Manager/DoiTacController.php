<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DoiTac;
use App\LoaiDoiTac;
use Auth;
use Illuminate\Support\Facades\Redirect;

class DoiTacController extends Controller
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
        $doi_tac = DoiTac::paginate(10);
   
        return view('admin.manager_data.doi_tac.index',['doitac' => $doi_tac, 'locale'=>$locale]);
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
        $loai_doi_tac = LoaiDoiTac::all();
        return view('admin.manager_data.doi_tac.create', ['loaidoitac' => $loai_doi_tac,'locale'=>$locale]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request,
        [
            'ten' => 'required|unique:doi_tac_translations,Ten',
            'noi_dung' => 'required',
            'hinh_anh' => 'image|mimes:jpeg,png,jpg'
        ],
        [
            'ten.required' => 'Bạn cần nhập tên đối tác',
            'ten.unique' => 'Tên đối tác đã được dùng',
            'noi_dung'  => 'Bạn chưa nhập nội dung',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,png,jpg)',
            'hinh_anh.image' => 'Bạn chỉ được chọn 1 file ảnh'
        ]);

        app()->setlocale($request->locale);
        $doi_tac = new DoiTac;
        $doi_tac->Ten = $request->ten;
        $doi_tac->loai_doi_tac_id = $request->loaidoitac;
        $doi_tac->slug = changeTitle($request->ten);
        $doi_tac->NoiDung = $request->noi_dung;

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/doi_tac/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/doi_tac",$hinh_anh);
            $doi_tac->HinhAnh = $hinh_anh;
        }
        else{
            $doi_tac->HinhAnh = "";
        }

        $doi_tac->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.doi-tac.index')->with('message','Bạn đã thêm đối tác thành công');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('doi-tac.index')->with('message','Bạn đã thêm đối tác thành công');
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
        $loai_doi_tac = LoaiDoiTac::all();
        $doi_tac = DoiTac::find($id);
        return view('admin.manager_data.doi_tac.edit', ['loaidoitac' => $loai_doi_tac, 'doitac' => $doi_tac,'locale'=>$locale]);
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
            'hinh_anh' => 'image|mimes:jpeg,png,jpg'
        ],
        [
            'ten.required' => 'Bạn cần nhập tên đối tác',
            'noi_dung.required' => 'Bạn cần nhập nội dung đối tác',
            'hinh_anh.mimes' => 'Bạn chỉ được chọn file (jpeg,png,jpg)',
            'hinh_anh.image' => 'Bạn chỉ được chọn 1 file ảnh'
        ]);

        app()->setlocale($request->locale);
        $doi_tac = DoiTac::find($id);

        $doi_tac->Ten = $request->ten;
        $doi_tac->NoiDung = $request->noi_dung;
        $doi_tac->slug = changeTitle($request->ten);

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/doi_tac/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/doi_tac",$hinh_anh);
            $doi_tac->HinhAnh = $hinh_anh;
        }
        else{
            $doi_tac->HinhAnh = "";
        }

        $doi_tac->save();
        return Redirect::back()->with('message', 'Bạn đã sửa đối tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $doi_tac = DoiTac::find($id);
        $doi_tac->delete();
        return $doi_tac->toJson();
    }
}
