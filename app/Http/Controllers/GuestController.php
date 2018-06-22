<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Admin;
use App\Meja;
use App\Peminjam;
use App\PinjamAlat;
use App\Posting;
use App\Praktikum;
use App\Ruang;
use App\User;
use App\viewalat;
use App\viewruang;
use App\Alat;

class GuestController extends Controller
{
    public function index()
    {
        $praktikum  =   Praktikum::get();
        $posting    =   Posting::where('status','Sudah')->orderBy('waktu','desc')->limit(15)->get();
        $konten     =   array(
            'praktikum' =>  $praktikum,
            'posting'   =>  $posting
        );
    	return view('guest/home',$konten);
    }
    public function alat()
    {

    	return view('guest/alat');
    }
    public function kegiatan()
    {
    	return view('guest/kegiatan');
    }
    public function berita($slug)
    {
        $post       =   Posting::where('slug',$slug)->where('status','Sudah')->get();
        $postNot    =   Posting::where('slug','<>',$slug)->where('status','Sudah')->get();
        $posting    =   array(
            'postView'  =>  $post,
            'postNot'   =>  $postNot
        );
    	return view('guest/berita',$posting);
    }
    public function login()
    {
    	return view('guest/login');
    }
    public function tampil()
    {
        $alat = Alat::all();
        return Datatables::of($alat)->make(true);
    }
}
