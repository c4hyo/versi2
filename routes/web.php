<?php
use \App\Http\Middleware\cekAdmin;
use \App\Http\Middleware\cekUser;


Route::get('/','GuestController@index');
Route::get('/alat','GuestController@alat');
Route::get('/kegiatan','GuestController@kegiatan');
Route::get('/berita','GuestController@berita');
Route::get('/login','GuestController@login');
Route::resource('guest','GuestController');
Route::get('alat/tampil','GuestController@tampil')->name('lihatAlat');



Route::post('/login','UserController@login');
Route::get('/logout','UserController@logout');
Route::group(['middleware'=>'cekUser'],function(){
	Route::get('/user', 'UserController@index');
	Route::get('/user/home', 'UserController@index');
	Route::get('/user/alat', 'UserController@alat');
	Route::get('/user/meja', 'UserController@meja');
	Route::get('/user/ruang', 'UserController@ruang');
	Route::get('/user/pengaturan', 'UserController@pengaturan');
});

Route::get('/admin', function() {return view('admin/404');});
Route::group(['middleware'=>'cekAdmin'],function(){
    Route::get('/bukanwp-admin/home','AdminController@index');
});

//  Route::get('/bukanwp-admin/home','AdminController@index');
Route::get('/bukanwp-admin', function() {return view('admin/login');});
Route::post('/bukanwp-admin','AdminController@login');
Route::get('/bukanwp-admin/logout','AdminController@logout');

