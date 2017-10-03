<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LoaiTin;
use App\LoaiTinTranslation;
use Illuminate\Support\Facades\Redirect;
use Auth;

class LoaiTinController extends Controller
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
        app()->setLocale($locale);
        $loai_tin = LoaiTin::paginate(10);
        return view('admin.manager_data.loai_tin.index',['loaitin' => $loai_tin, 'locale'=>$locale]);
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
    	return view('admin.manager_data.loai_tin.create',['locale'=>$locale]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
    	$this->validate($request,
    	[
    		'ten' => 'required'
    	],
    	[
    		'ten.required' => 'Bạn chưa nhập tên loại tin'
    	]);
        
        app()->setlocale($request->locale);
    	$loai_tin = new LoaiTin;
    	$loai_tin->Ten = $request->ten;
    	$loai_tin->Slug = changeTitle($request->ten);

    	$loai_tin->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.loai-tin.index')->with('message','Bạn đã thêm loại tin thành công');
        } elseif (Auth::user()->level == 2) {
    	    return redirect()->route('loai-tin.index')->with('message','Bạn đã thêm loại tin thành công');
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
        $loai_tin = LoaiTin::find($id);
    	return view('admin.manager_data.loai_tin.edit', ['loaitin' => $loai_tin, 'locale'=>$locale]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id) {
    	$this->validate($request,
    	[
    		'ten' => 'required'
    	],
    	[
    		'ten.required' => 'Bạn chưa nhập tên loại tin'
    	]);

        app()->setlocale($request->locale);
    	$loai_tin = LoaiTin::find($id);
    	$loai_tin->Ten = $request->ten;
    	$loai_tin->save();

    	return Redirect::back()->with('message', 'Bạn đã sửa loại tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
    	$loai_tin = LoaiTin::find($id);
    	$loai_tin->delete();
    	return $loai_tin->toJson();
    }
}
