<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LoaiDoiTac;
use App\LoaiDoiTacTranslation;
use Illuminate\Support\Facades\Redirect;
use Auth;

class LoaiDoiTacController extends Controller
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
        $loai_doi_tac = LoaiDoiTac::paginate(10);
        return view('admin.manager_data.loai_doi_tac.index',['loaidoitac' => $loai_doi_tac, 'locale'=>$locale]);
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
    	return view('admin.manager_data.loai_doi_tac.create',['locale'=>$locale]);
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
    		'ten.required' => 'Bạn chưa nhập tên loại đối tác'
    	]);
        
        app()->setlocale($request->locale);
    	$loai_doi_tac = new LoaiDoiTac;
    	$loai_doi_tac->Ten = $request->ten;
    	$loai_doi_tac->Slug = changeTitle($request->ten);

    	$loai_doi_tac->save();
    	if (Auth::user()->level == 1) {
            return redirect()->route('admin.loai-doi-tac.index')->with('message','Bạn đã thêm loại đối tác thành công');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('loai-doi-tac.index')->with('message','Bạn đã thêm loại đối tác thành công');
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
        $loai_doi_tac = LoaiDoiTac::find($id);
    	return view('admin.manager_data.loai_doi_tac.edit', ['loaidoitac' => $loai_doi_tac, 'locale'=>$locale]);
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
    	$loai_doi_tac = LoaiDoiTac::find($id);
    	$loai_doi_tac->Ten = $request->ten;
    	$loai_doi_tac->Slug = changeTitle($request->ten);

    	$loai_doi_tac->save();

    	return Redirect::back()->with('message', 'Bạn đã sửa loại đối tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
    	$loai_doi_tac = LoaiDoiTac::find($id);
    	$loai_doi_tac->delete();
    	return $loai_doi_tac->toJson();
    }
}
