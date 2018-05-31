<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Alat;

class GuestController extends Controller
{
    public function index()
    {
    	return view('guest/home');
    }
    public function alat()
    {
    	return view('guest/alat');
    }
    public function kegiatan()
    {
    	return view('guest/kegiatan');
    }
    public function berita()
    {
    	return view('guest/berita');
    }
    public function login()
    {
    	return view('guest/login');
    }
    public function tampil()
    {
        $alat = Alat::all();
        return Datatables::of($alat)
        ->addColumn('gambar',function($alat){
            if($alat->gambar == NULL){
                return 'Tidak ada gambar';
            }else{
                return '<img class ="rounded-square" width="50" src="'.url($alat->gambar).'"alt ="">';
            }
        })->make(true);
    }
}
