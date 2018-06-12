<?php

namespace App\Http\Controllers;


use Yajra\DataTables\Datatables;
use App\Admin;
use App\Alat;
use App\Meja;
use App\Peminjam;
use App\PinjamAlat;
use App\Posting;
use App\Praktikum;
use App\Ruang;
use App\User;
use App\viewalat;
use App\viewruang;
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
        $request->validate([
            'user'      => 'required',
            'password'  =>  'required|min:8'
        ]);
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
        $online     = Peminjam::where('status','Online')->get();
        $session = array(
            'nama'      => session('nama'),
            'user'      => session('user'),
            'meja'      => count(Meja::all()),
            'alat'      => count(Alat::where('stok','<>','0')->get()),
            'posting'   => count(Posting::all()),
            'online'    => $online
        );
        return view('admin/home',$session);
    }
    public function peminjaman()
    {
        $viewAlat   =   viewalat::groupBy(['username','tgl_pinjam','tgl_kembali','status'])
                        ->where('status','<>','Batal')->get();
        $viewRuang  =   viewruang::where('status','<>','Batal')->get();
        $meja       =   Meja::get();
        $cntRuang   =   count(viewruang::groupBy(['username'])->where('status','<>','Batal')->get());
        $cntAlat    =   count(viewalat::groupBy(['username','status'])->where('status','<>','Batal')->get());
        $alat       =   viewalat::where('status','<>','Batal')->get();
        $session = array(
            'nama'      =>  session('nama'),
            'user'      =>  session('user'),
            'meja'      =>  $meja,
            'viewAlat'  =>  $viewAlat,
            'cntAlat'   =>  $cntAlat,
            'alat1'     =>  $alat,
            'cntRuang'  =>  $cntRuang,
            'Ruang'     =>  $viewRuang
        );
        return view('admin/peminjaman',$session);
    }
    public function pengaturan()
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        return view('admin/pengaturan',$session);
    }
    public function pengelolaan()
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        return view('admin/kelola',$session);
    }
     public function posting()
    {
        $posting    =   Posting::get();
        $session = array(
            'nama'      =>  session('nama'),
            'user'      =>  session('user'),
            'posting'   =>  $posting
        );
        return view('admin/posting',$session);
    }
    public function postAdd(Request $request)
    {

        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $judul  =   $request['judul'];
        $slug   =   strtolower(str_replace(" ", "-", $judul));
        // dd($judul);
        Posting::create([
            'judul'     =>  $judul,
            'slug'      =>  $slug,
            'posting'   =>  $request['posting']
        ]);
        return redirect()->back()->with('sukses','Posting berhasil ditambahkan');
    }
     public function praktikum()
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        return view('admin/praktikum',$session);
    }
    public function online()
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $online = Peminjam::where('status','Online');
        return Datatables::of($online)
            ->make(true);
    }
    public function alatSetuju($nim,$pinjam,$kembali)
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'tgl_pinjam'    =>  $pinjam,
            'tgl_kembali'   =>  $kembali,
            'status'        =>  "Belum"
        );
        PinjamAlat::where($kondisi)->update([
            'status'        =>  "Sudah"
        ]);
        return redirect()->back()->with('sukses','Sudah menyetujui peminjaman alat ');
    }
    public function alatBatal($nim,$pinjam,$kembali)
    {
       $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'tgl_pinjam'    =>  $pinjam,
            'tgl_kembali'   =>  $kembali,
            'status'        =>  "Belum"
        );
        PinjamAlat::where($kondisi)->update([
            'status'        =>  "Batal"
        ]);
        return redirect()->back()->with('gagal','Peminjaman alat dibatalkan');
    }
    public function ruangSetuju($nim,$tgl,$guna)
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'kegunaan'      =>  $guna,
            'tgl_pinjam'    =>  $tgl,
            'status'        =>  "Belum"
        );
        Ruang::where($kondisi)->update([
            'status'        =>  "Sudah"
        ]);
        return redirect()->back()->with('sukses','Peminjaman ruang disetujui');
    }
    public function ruangBatal($nim,$tgl,$guna)
    {
        $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'kegunaan'      =>  $guna,
            'tgl_pinjam'    =>  $tgl,
            'status'        =>  "Belum"
        );
        Ruang::where($kondisi)->update([
            'status'        =>  "Batal"
        ]);
        return redirect()->back()->with('gagal','Peminjaman ruang dibatalkan');
    }
}
