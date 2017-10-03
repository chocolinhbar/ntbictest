<?php
Route::get('/', function() {
	return view('admin.index');
})->name('moderator_dashboard');
	
Route::resource('tin-tuc', 'Manager\TinTucController');
Route::resource('loai-tin','Manager\LoaiTinController');
Route::resource('su-kien','Manager\SuKienController');
Route::resource('cong-nghe','Manager\CongNgheController');
Route::resource('doi-tac','Manager\DoiTacController');
Route::resource('loai-doi-tac','Manager\LoaiDoiTacController');
Route::resource('to-chuc','Manager\TochucController');
Route::resource('cau-hoi-thuong-gap','Manager\CauhoithuonggapController');
Route::resource('tuyen-dung','Manager\TuyenDungController');
Route::resource('chuyen-gia','Manager\ChuyenGiaController');

Route::resource('su-kien-slideshow','Manager\SuKienSlideshowController');
Route::resource('logo-doi-tac','Manager\LogoDoiTacController');
Route::resource('anh-sidebar','Manager\AnhSideBarController');
Route::resource('lien-he','Manager\LienHeController');
Route::resource('menu','Manager\MenuController');

Route::get('profile','Manager\UserController@getProfile')->name('moderator.profile');	
Route::post('profile-account','Manager\UserController@updateProfile');
Route::post('profile-avatar','Manager\UserController@updateAvatar');
Route::post('profile-password','Manager\UserController@updatePassword');

Route::get('notification/{id}', 'Manager\UserController@getDetailNotification');
Route::post('notification-delete/{id}','Manager\UserController@DeleteNotification');
