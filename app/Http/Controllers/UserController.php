<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Peminjam;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	$request->validate([
    		'nim' 		=>'required|min:7',
    		'password'	=>'required|min:8'
    	]);
    	$password	= $request->input('password');
    	$mahasiswa 	= Peminjam::where('username',$request->input('nim'))->get();
    	if(count($mahasiswa)==1){
    	foreach ($mahasiswa as $cek) {
    		if(Hash::check($password, $cek->password)){
                session([
                    'nim'   =>  $request['nim'],
                    'nama'  =>  $cek->nama,
                ]);
    			return redirect('/user');
    		}else{
    			return redirect('/login')->with('gagal','Kata Sandi Salah');
    		}
    	}
    }else{
    	return redirect('/login')->with('gagal','NIM tidak ditemukan');
    }
    }
    public function logout($value='')
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        $hancur = session()->flush();
        // dd($hancur);
        return redirect('/login')->with('sukses','Anda berhasil keluar');
    }

    public function index()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
    	   return view('user/home',$session);
    }
    public function alat()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );

           return view('user/alat',$session);
    }
    public function meja()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
           return view('user/meja',$session);
    }
    public function ruang()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
           return view('user/ruang',$session);
    }
    public function pengaturan()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
           return view('user/pengaturan',$session);

    }
}
