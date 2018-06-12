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
Route::group(['middleware'=>'cekUser'],function()
{
	Route::get('/user', 'UserController@index');
	Route::get('/user/home', 'UserController@index');
    Route::get('/user/alat', 'UserController@alat');
    Route::get('/user/alat/cart','UserController@cart');
    Route::get('/user/alat/cart/batal','UserController@cartbatal');
    Route::post('/user/alat/cart','UserController@pinjamAlat');
    Route::post('/user/alat/cart/{id}','UserController@tambahKeranjang');
    Route::get('/user/alat/cart/{id}/batal','UserController@cart_batal_1');
	Route::get('/user/meja', 'UserController@meja');
    Route::get('/user/ruang', 'UserController@ruang');
    // Route::get('/user/ruang/setuju/{nim}/{tgl}/{guna}','UserController@ruangSetuju');
    // Route::get('/user/ruang/batal/{nim}/{tgl}/{guna}','UserController@ruangBatal');
    Route::post('/user/ruang','UserController@ruangPinjam');
	Route::get('/user/pengaturan', 'UserController@pengaturan');
});

Route::get('/admin', function() {return view('admin/404');});
Route::group(['middleware'=>'cekAdmin'],function(){
    Route::get('/bukanwp-admin/home','AdminController@index');
    Route::get('/bukanwp-admin/peminjaman','AdminController@peminjaman');
    Route::get('/bukanwp-admin/peminjaman/alat/setuju/{nim}/{pinjam}/{kembali}','AdminController@alatSetuju');
    Route::get('/bukanwp-admin/peminjaman/alat/batal/{nim}/{pinjam}/{kembali}','AdminController@alatBatal');
    Route::get('/bukanwp-admin/peminjaman/ruang/setuju/{nim}/{tgl}/{guna}','AdminController@ruangSetuju');
    Route::get('/bukanwp-admin/peminjaman/ruang/batal/{nim}/{tgl}/{guna}','AdminController@ruangBatal');
    Route::get('/bukanwp-admin/pengelolaan','AdminController@pengelolaan');
    Route::get('/bukanwp-admin/posting','AdminController@posting');
    Route::post('/bukanwp-admin/posting','AdminController@postAdd');
    Route::get('/bukanwp-admin/praktikum','AdminController@praktikum');
    Route::get('/bukanwp-admin/pengaturan','AdminController@pengaturan');
    Route::get('/bukanwp-admin/peminjam/online','AdminController@online')->name('Online');
});

//  Route::get('/bukanwp-admin/home','AdminController@index');
Route::get('/bukanwp-admin', function() {return view('admin/login');});
Route::post('/bukanwp-admin','AdminController@login');
Route::get('/bukanwp-admin/logout','AdminController@logout');

