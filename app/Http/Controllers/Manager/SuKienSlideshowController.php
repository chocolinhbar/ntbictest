<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuKienSlideshow;
use File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SuKienSlideshowRequest;
use Illuminate\Database\Query\Builder;

class SuKienSlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $su_kien_slideshow = SuKienSlideshow::paginate(10);
        return view('admin.manager_data.su_kien_slideshow.index',['sukienslideshow'=>$su_kien_slideshow]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager_data.su_kien_slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuKienSlideshowRequest $request)
    {
        $su_kien_slideshow = new SuKienSlideshow;
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/su_kien_slideshow/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/su_kien_slideshow",$hinh_anh);
            $su_kien_slideshow->HinhAnh = "assets/upload/su_kien_slideshow/".$hinh_anh;
        }
        else{
            $su_kien_slideshow->HinhAnh = "";
        }    
        $su_kien_slideshow->save();
        return redirect()->route('admin.su-kien-slideshow.index')->with('message','Bạn đã thêm hình ảnh sự kiện slideshow thành công');
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
        $su_kien_slideshow = SuKienSlideshow::find($id);
        return view('admin.manager_data.su_kien_slideshow.edit', ['sukienslideshow' => $su_kien_slideshow]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuKienSlideshowRequest $request, $id)
    {
        $su_kien_slideshow = SuKienSlideshow::find($id);
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/su_kien_slideshow/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/su_kien_slideshow/",$hinh_anh);
            $su_kien_slideshow->HinhAnh = "assets/upload/su_kien_slideshow/".$hinh_anh;
        }
        if($request->delete_logo == "delete" && $su_kien_slideshow->HinhAnh != ""){
           $str = substr($su_kien_slideshow->HinhAnh, 0);
          
             File::delete($str);
           $su_kien_slideshow->HinhAnh = "";
           
       }
        $su_kien_slideshow->save();
       return redirect::back()->with('message','Bạn đã sửa hình ảnh sự kiện slideshow thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $su_kien_slideshow = SuKienSlideshow::find($id);
        $su_kien_slideshow->delete();
        return $su_kien_slideshow->toJson();
    }
}
