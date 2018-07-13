<?php
// use \App\Http\Middleware\cekAdmin;
// use \App\Http\Middleware\cekUser;

Route::get('/','GuestController@index');
Route::get('/alat','GuestController@alat');
Route::get('/kegiatan','GuestController@kegiatan');
Route::get('/posting/{slug}','GuestController@berita');
Route::get('/praktikum/{slug}','GuestController@prak');
Route::get('/login','GuestController@login');
Route::get('/langkah-peminjaman','GuestController@pinjam');
Route::resource('guest','GuestController');
Route::get('alat/tampil','GuestController@tampil')->name('lihatAlat');
Route::get('/pdf', function () {
    $pdf = PDF::loadView('admin/home/alat')->setPaper('a4', 'potrait');
    return $pdf->download("COBA.pdf");
});

Route::post('/login','UserController@login');
Route::get('/logout','UserController@logout');
Route::group(['middleware'=>['cekUser']],function()
{
	Route::get('/user', 'UserController@index');
    Route::get('/user/home', 'UserController@index');
    Route::get('/user/home/kembali/{pinjam}/{kembal}','UserController@alatKembali');
    Route::post('/user/surat/alat/{pinjam}/{kembali}','UserController@suratAlat');
    Route::post('/user/surat/ruang/{pinjam}','UserController@suratRuang');
    Route::get('/user/alat', 'UserController@alat');
    Route::get('/user/alat/cart','UserController@cart');
    Route::get('/user/alat/cart/batal','UserController@cartbatal');
    Route::post('/user/alat/cart','UserController@pinjamAlat');
    Route::post('/user/alat/cart/{id}','UserController@tambahKeranjang');
    Route::get('/user/alat/cart/{id}/batal','UserController@cart_batal_1');
    Route::get('/user/meja', 'UserController@meja');
    Route::get('/user/meja/pinjam/{id}','UserController@mejaPinjam');
    Route::get('/user/ruang', 'UserController@ruang');
    Route::post('/user/ruang','UserController@ruangPinjam');
    Route::get('/user/pengaturan', 'UserController@pengaturan');
    Route::post('/user/pengaturan/pass','UserController@passSetting');
    Route::post('/user/pengaturan/profil','UserController@profilSetting');
});
Route::get('/admin', function() {return abort('404');});
Route::group(['middleware'=>['cekAdmin']],function(){
    Route::get('/bukanwp-admin/home','AdminController@index');
    Route::get('/bukanwp-admin/peminjaman','AdminController@peminjaman');
    Route::get('/bukanwp-admin/peminjaman/alat/setuju/{nim}/{pinjam}/{kembali}','AdminController@alatSetuju');
    Route::get('/bukanwp-admin/peminjaman/alat/batal/{nim}/{pinjam}/{kembali}','AdminController@alatBatal');
    Route::get('/bukanwp-admin/peminjaman/alat/terima/{nim}/{pinjam}/{kembali}','AdminController@alatTerima');
    Route::get('/bukanwp-admin/peminjaman/ruang/setuju/{nim}/{tgl}/{guna}','AdminController@ruangSetuju');
    Route::get('/bukanwp-admin/peminjaman/ruang/batal/{nim}/{tgl}/{guna}','AdminController@ruangBatal');
    Route::get('/bukanwp-admin/peminjaman/meja/setuju/{id}','AdminController@mejaSetuju');
    Route::get('/bukanwp-admin/peminjaman/meja/batal/{id}','AdminController@mejaBatal');
    Route::get('/bukanwp-admin/pengelolaan','AdminController@pengelolaan');
    Route::post('/bukanwp-admin/pengelolaan/alat/','AdminController@alatAdd');
    Route::post('/bukanwp-admin/pengelolaan/alat/edit/{id}','AdminController@alatUbah');
    Route::get('/bukanwp-admin/pengelolaan/alat/hapus/{id}','AdminController@alatDel');
    Route::get('/bukanwp-admin/posting','AdminController@posting');
    Route::post('/bukanwp-admin/posting','AdminController@postAdd');
    Route::get('/bukanwp-admin/posting/show/{id}','AdminController@postShow');
    Route::get('/bukanwp-admin/posting/tidak/{id}','AdminController@postDont');
    Route::get('/bukanwp-admin/posting/hapus/{id}','AdminController@postDel');
    Route::post('/bukanwp-admin/posting/ubah/{id}','AdminController@postEdit');
    Route::get('/bukanwp-admin/praktikum','AdminController@praktikum');
    Route::post('/bukanwp-admin/praktikum', 'AdminController@prakAdd');
    Route::get('/bukanwp-admin/praktikum/{slug}','AdminController@detailPrak');
    Route::post('/bukanwp-admin/praktikum/{id}','AdminController@editPrak');
    Route::get('/bukanwp-admin/praktikum/{judul}/aktif','AdminController@prakAktif');
    Route::get('/bukanwp-admin/praktikum/{judul}/nonaktif','AdminController@prakNonAktif');
    Route::post('/bukanwp-admin/praktikum/{judul}/konten','AdminController@prakKonten');
    Route::get('/bukanwp-admin/pengaturan','AdminController@pengaturan');
    Route::post('/bukanwp-admin/pengaturan/addUser','AdminController@addUser');
    Route::get('/bukanwp-admin/pengaturan/{id}/reset','AdminController@resetPass');
    Route::get('/bukanwp-admin/pengaturan/alat','AdminController@delAlat');
    Route::post('/bukanwp-admin/pengaturan/admin/{user}/profil','AdminController@editProfil');
    Route::post('/bukanwp-admin/pengaturan/admin/{user}/pass','AdminController@editPass');
    Route::get('/bukanwp-admin/pengaturan/ruang','AdminController@delRuang');
    Route::get('/bukanwp-admin/pengaturan/posting','AdminController@delPosting');
    Route::post('/bukanwp-admin/unduh/alat','AdminController@unduhAlat');
    Route::post('/bukanwp-admin/unduh/ruang','AdminController@unduhRuang');
    Route::resource('admin', 'AdminController');
    Route::get('/bukanwp-admin/pengaturan/del/ruang','AdminController@delRng')->name('ruang');
    Route::get('/bukanwp-admin/pengaturan/del/alat','AdminController@delAlt')->name('alat');
    Route::get('/bukanwp-admin/pengaturan/del/post','AdminController@delPost')->name('posting');
    Route::get('/bukanwp-admin/pengaturan/user','AdminController@setUser')->name('user');
    Route::get('/bukanwp-admin/peminjam/online','AdminController@online')->name('Online');
});
Route::get('/bukanwp-admin', function() {return view('admin/login');});
Route::post('/bukanwp-admin','AdminController@login');
Route::get('/bukanwp-admin/logout','AdminController@logout');

Route::get('/cek/alat', function () {
    return view('admin/home/alat');
});
Route::get('/cek/ruang', function () {
    return view('admin/home/ruang');
});
