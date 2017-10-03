<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('register','Auth\RegisterController@showRegistrationForm');
Route::post('register','Auth\RegisterController@register');
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');
Route::get('user/verify/{token}', 'Manager\UserController@verify_user_mo');

Route::get('abc',function(){
	 return bcrypt('123456');
});
Route::get('/','PageController\PageController@TrangChu')->name('home');
//Route::get('tintuc','PageController\PageController@TinTuc');
// Route::get('lien-he','PageController\PageController@LienHe');
Route::get('detail','PageController\PageController@Detail');
Route::get('cau-hoi-thuong-gap','PageController\PageController@Cauhoithuonggap');

Route::post('/change-language','SessionController@changeLanguage');

Route::get('gioi-thieu-chung','PageController\PageController@GioiThieuChung');
Route::get('vi-tri-chuc-nang','PageController\PageController@ViTriChucNang');
Route::get('su-menh-tam-nhin','PageController\PageController@SuMenhTamNhin');
Route::get('doi-ngu-trung-tam','PageController\PageController@DoiNguTrungTam');
Route::get('co-cau','PageController\PageController@CoCau');
Route::get('chuyen-gia','PageController\PageController@ChuyenGia');

Route::get('tuyen-dung','PageController\PageController@TuyenDung');
Route::get('tuyen-dung/{slug}','PageController\PageController@DetailsTuyenDung');
// show all news of all of kind
Route::get('tin-tuc','PageController\TinTucController@allNews');
// show all news of  a kind
Route::get('tin-tuc/{slug}','PageController\TinTucController@newsOfKind');
//show detail one new
Route::get('tin-tuc/{slug_loai_tin}/{slug_tin_tuc}','PageController\TinTucController@detailsNew');
Route::get('tin-noi-bat','PageController\TinTucController@getTinNoiBat');
Route::get('tin-tuc','PageController\TinTucController@allNews');
//show all su kien
Route::get('su-kien','PageController\SuKienController@danhSachSuKien');
Route::get('su-kien/{slug}','PageController\SuKienController@detailsSuKien');
// nguoi dang ky su kien
// Route::get('su-kien/{slug}/dang-ki','PageController\SuKienController@NguoiDangKiSuKien');
Route::post('su-kien/{id}','PageController\SuKienController@NguoiDangKiSuKien');

//show cong nghe
Route::get('cong-nghe','PageController\PageController@CongNghe');
Route::get('cong-nghe/{slug}','PageController\PageController@DeTailsCongNghe');

//show doi tac
Route::get('doi-tac/{slug_ldt}','PageController\DoiTacController@LoaiDoiTac');
Route::get('doi-tac/{slug_ldt}/{slug_dt}','PageController\DoiTacController@DeTailsDoiTac');
//lien he
Route::get('lien-he','PageController\LienHeController@create');
Route::post('lien-he','PageController\LienHeController@store');
//serach
Route::get('search','SearchController@searchAll');
