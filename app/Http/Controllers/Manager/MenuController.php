<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\MenuTranslation;
use File;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MenuRequest;


class MenuController extends Controller
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
        $menu = Menu::paginate(10);
        return view('admin.manager_data.menu.index',['menu' => $menu, 'locale'=>$locale]);
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
        return view('admin.manager_data.menu.create',['locale'=>$locale]);
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
            'ten.required' => 'Bạn chưa nhập tên menu'
        ]);
        
        app()->setlocale($request->locale);
        $loai_tin = new Menu;
        $loai_tin->Ten = $request->ten;
        $loai_tin->Slug = changeTitle($request->ten);

        $loai_tin->save();
        if (Auth::user()->level == 1) {
            return redirect()->route('admin.menu.index')->with('message','Bạn đã thêm menu thành công');
        } elseif (Auth::user()->level == 2) {
            return redirect()->route('menu.index')->with('message','Bạn đã thêm menu thành công');
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
        $menu = Menu::find($id);
        return view('admin.manager_data.menu.edit', ['menu' => $menu, 'locale'=>$locale]);
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
        $menu = Menu::find($id);
        $menu->Ten = $request->ten;
        $menu->save();

        return Redirect::back()->with('message', 'Bạn đã sửa menu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $loai_tin = Menu::find($id);
        $loai_tin->delete();
        return $loai_tin->toJson();
    }
}
