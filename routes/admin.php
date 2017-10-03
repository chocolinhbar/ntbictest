<?php
Route::get('/', function() {
	return view('admin.index');
})->name('admin_dashboard');
		
Route::resource('tin-tuc', 'Manager\TinTucController',['names' => [
	'index' => 'admin.tin-tuc.index'
]]);
Route::resource('loai-tin','Manager\LoaiTinController',['names' => [
	'index' => 'admin.loai-tin.index'
]]);
Route::resource('su-kien','Manager\SuKienController',['names' => [
	'index' => 'admin.su-kien.index'
]]);
Route::resource('cong-nghe','Manager\CongNgheController',['names' => [
	'index' => 'admin.cong-nghe.index'
]]);
Route::resource('loai-doi-tac','Manager\LoaiDoiTacController',['names' => [
	'index' => 'admin.loai-doi-tac.index'
]]);
Route::resource('doi-tac','Manager\DoiTacController',['names' => [
	'index' => 'admin.doi-tac.index'
]]);
Route::resource('to-chuc','Manager\ToChucController',['names' => [
	'index' => 'admin.to-chuc.index'
]]);
Route::resource('cau-hoi-thuong-gap','Manager\CauhoithuonggapController',['names' => [
	'index' => 'admin.cau-hoi-thuong-gap.index'
]]);
Route::resource('tuyen-dung','Manager\TuyenDungController',['names' => [
	'index' => 'admin.tuyen-dung.index'
]]);
Route::resource('chuyen-gia','Manager\ChuyenGiaController',['names' => [
	'index' => 'admin.chuyen-gia.index'
]]);
Route::resource('logo-doi-tac','Manager\LogoDoiTacController',['names' => [
	'index' => 'admin.logo-doi-tac.index'
]]);
Route::resource('anh-sidebar','Manager\AnhSideBarController',['names' => [
	'index' => 'admin.anh-sidebar.index'
]]);
Route::resource('lien-he','Manager\LienHeController',['names' => [
	'index' => 'admin.lien-he.index'
]]);
Route::resource('su-kien-slideshow','Manager\SuKienSlideshowController',['names' => [
	'index' => 'admin.su-kien-slideshow.index'
]]);

Route::resource('menu','Manager\MenuController',['names' => [
	'index' => 'admin.menu.index'
]]);

Route::resource('users','Manager\UserController');

Route::get('profile','Manager\UserController@getProfile')->name('admin.profile');
Route::post('profile-account','Manager\UserController@updateProfile');
Route::post('profile-avatar','Manager\UserController@updateAvatar');
Route::post('profile-password','Manager\UserController@updatePassword');

//notificaiton
Route::get('send-notification','Manager\UserController@getSendNotification')->name('send.notification');
Route::post('send-notif','Manager\UserController@postSendNotification');
Route::get('notification/{id}', 'Manager\UserController@getDetailNotification');
Route::post('notification-delete/{id}','Manager\UserController@DeleteNotification');