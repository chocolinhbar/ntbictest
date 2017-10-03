<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HinhSidebar;
use File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HinhAnhSidebar;

class AnhSideBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hinh_anh_sidebar = HinhSidebar::paginate(10);
        return view('admin.manager_data.hinh_anh_sidebar.index',['hinhanhsidebar'=>$hinh_anh_sidebar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager_data.hinh_anh_sidebar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HinhAnhSidebar $request)
    {
        $hinh_anh_sidebar = new HinhSidebar;
        $hinh_anh_sidebar->Link = $request->link;
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/hinh_anh_sidebar/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/hinh_anh_sidebar",$hinh_anh);
            $hinh_anh_sidebar->HinhAnh = "assets/upload/hinh_anh_sidebar/".$hinh_anh;
        }
        else{
            $hinh_anh_sidebar->HinhAnh = "";
        }    
        $hinh_anh_sidebar->save();
        return redirect()->route('admin.anh-sidebar.index')->with('message','Bạn đã thêm hình ảnh sidebar thành công');
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
        $hinh_anh_sidebar = HinhSidebar::find($id);
        return view('admin.manager_data.hinh_anh_sidebar.edit', ['hinhanhsidebar' => $hinh_anh_sidebar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HinhAnhSidebar $request, $id)
    {
        $hinh_anh_sidebar = HinhSidebar::find($id);
        $hinh_anh_sidebar->Link = $request->link;
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect::back()->with('message','Bạn chỉ được chọn file (jpg,png,jpeg)');
            }
            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/hinh_anh_sidebar/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/hinh_anh_sidebar/",$hinh_anh);
            $hinh_anh_sidebar->HinhAnh = "assets/upload/hinh_anh_sidebar/".$hinh_anh;
        }
        if($request->delete_logo == "delete" && $hinh_anh_sidebar->HinhAnh != ""){
           $str = substr($hinh_anh_sidebar->HinhAnh, 0);
          
             File::delete($str);
           $hinh_anh_sidebar->HinhAnh = "";
           
       }
        $hinh_anh_sidebar->save();
       return redirect::back()->with('message','Bạn đã sửa hình ảnh Sidebar thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hinh_anh_sidebar = HinhSidebar::find($id);
        $hinh_anh_sidebar->delete();
        return $hinh_anh_sidebar->toJson();
    }
}
