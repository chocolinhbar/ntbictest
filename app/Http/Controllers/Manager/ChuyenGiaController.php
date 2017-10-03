<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ChuyenGia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ChuyenGiaRequest;
use File;
use App\User;
use Auth;

class ChuyenGiaController extends Controller
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
            $chuyen_gia = ChuyenGia::paginate(10);
        } elseif (Auth::user()->level == 2) {
            $chuyen_gia = ChuyenGia::where('users_id', Auth::user()->id)->paginate(10);
        } 
        return view('admin.manager_data.chuyen_gia.index',['chuyengia' => $chuyen_gia, 'locale'=>$locale]);
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
        $chuyen_gia = ChuyenGia::all();
        return view('admin.manager_data.chuyen_gia.create',['chuyengia' => $chuyen_gia, 'locale'=>$locale]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChuyenGiaRequest $request)
    {
        app()->setlocale($request->locale);
        $chuyen_gia = new ChuyenGia;
        $chuyen_gia->Ten = $request->ten;
        $chuyen_gia->slug= changeTitle($request->ten);
        $chuyen_gia->ChucVu=$request->chuc_vu;
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/chuyen_gia/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/chuyen_gia",$hinh_anh);
            $chuyen_gia->HinhAnh = "assets/upload/chuyen_gia/".$hinh_anh;
        }
        else{
            $chuyen_gia->HinhAnh = "";
        }
        $chuyen_gia->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.chuyen-gia.index')->with('message','Bạn đã thêm chuyên gia thành công');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('chuyen-gia.index')->with('message','Bạn đã thêm chuyên gia thành công');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $chuyen_gia = ChuyenGia::find($id);
        return view('admin.manager_data.chuyen_gia.edit', ['chuyengia' => $chuyen_gia, 'locale'=>$locale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChuyenGiaRequest $request, $id)
    {
        app()->setlocale($request->locale);
        $chuyen_gia = ChuyenGia::find($id);
        $chuyen_gia->Ten = $request->ten;
        $chuyen_gia->slug= changeTitle($request->ten);
        $chuyen_gia->ChucVu=$request->chuc_vu;
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/chuyen_gia/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/chuyen_gia/",$hinh_anh);
            $chuyen_gia->HinhAnh = "assets/upload/chuyen_gia/".$hinh_anh;
        }
        if($request->delete_logo == "delete" && $chuyen_gia->HinhAnh != ""){
           $str = substr($chuyen_gia->HinhAnh, 0);
          
             File::delete($str);
           $chuyen_gia->HinhAnh = "";
           
       }
       $chuyen_gia->save();
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
        $chuyen_gia = ChuyenGia::find($id);
        $chuyen_gia->delete();
        return $chuyen_gia->toJson();
    }
}
