<?php

namespace App\Http\Controllers\Manager;

use App\LogoDoiTac;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LogoDoiTacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = LogoDoiTac::paginate(10);
        return view('admin.manager_data.logo_doi_tac.index',['logo' => $logo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager_data.logo_doi_tac.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'link' => 'required',
            'hinh_anh' => 'required'
        ],
        [
            'link.required' => 'Bạn cần nhập link của logo ảnh',
            'hinh_anh.required' => 'Bạn cần nhập hình ảnh'
        ]);

        $logo = new LogoDoiTac;
        $logo->Link = $request->link;

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/logo_doitac/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/logo_doitac",$hinh_anh);
            $logo->HinhAnh = $hinh_anh;
        }
        else{
            $logo->HinhAnh = "";
        }

        $logo->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.logo-doi-tac.index')->with('message','Bạn đã thêm tin tức thành công');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('logo-doi-tac.index')->with('message','Bạn đã thêm tin tức thành công');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogoDoiTac  $logoDoiTac
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = LogoDoiTac::find($id);
        return view('admin.manager_data.logo_doi_tac.edit', ['logo' => $logo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogoDoiTac  $logoDoiTac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'link' => 'required',
            'hinh_anh' => 'required'
        ],
        [
            'link.required' => 'Bạn cần nhập link của logo ảnh',
            'hinh_anh.required' => 'Bạn cần nhập hình ảnh'
        ]);

        $logo = LogoDoiTac::find($id);
        $logo->Link = $request->link;

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/logo_doitac/".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/logo_doitac",$hinh_anh);
            $logo->HinhAnh = $hinh_anh;
        }
        else{
            $logo->HinhAnh = "";
        }

        $logo->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.logo-doi-tac.index')->with('message','Bạn đã thêm tin tức thành công');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('logo-doi-tac.index')->with('message','Bạn đã thêm tin tức thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogoDoiTac  $logoDoiTac
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = LogoDoiTac::find($id);
        $logo->delete();
        return $logo->toJson();
    }
}
