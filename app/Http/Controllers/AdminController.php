<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Alat;
use App\Meja;
use App\Peminjam;
use App\PinjamAlat;
use App\Posting;
use App\Praktikum;
use App\Ruang;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $username   =   $request['user'];
        $password   =   $request['password'];
        $admin = Admin::where('user',$username)->get();
        if(count($admin)>0){
            foreach($admin as $admin){
                if(Hash::check($password,$admin->password)){
                    session([
                        'user'  => $username,
                        'nama'  => $admin->nama,
                    ]);
                    return redirect('bukanwp-admin/home');
                }else{
                    return redirect('/bukanwp-admin')->with('gagal','Kata Sandi Salah');
                }
            }
        }else{
            return redirect('/bukanwp-admin')->with('gagal','Nama Pengguna tidak terdaftar');
        }
    }
    public function logout()
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $hancur = session()->flush();
        // dd($hancur);
        return redirect('/bukanwp-admin')->with('sukses','Anda berhasil keluar');
    }
    public function index()
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        return view('admin/home',$session);
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        //
    }


    public function update(Request $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
    {
        //
    }
}
