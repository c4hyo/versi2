<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Peminjam;
use App\Meja;
use App\Alat;
use App\Ruang;
use App\PinjamAlat;

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
                Peminjam::where('username',$request->input('nim'))->update([
                    'status' => "Online"
                ]);
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
        $nim        = session('nim');
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        Peminjam::where('username',$nim)->update([
            'status' => "Offline"
        ]);
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
        $nim        =   session('nim');
        $alat       =   Alat::get();
        $kondisi    =   array(
            'id_peminjam'   => $nim,
            'status'        => "Proses"
        );
        $count      =   PinjamAlat::where($kondisi)->get();
        $session    =   array(
            'nama'      =>  session('nama'),
            'nim'       =>  session('nim'),
            'alat'      =>  $alat,
            'pinjamAlat'=>  $count
        );

           return view('user/alat',$session);
    }
    public function meja()
    {
        $meja       = Meja::get();
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim'),
            'meja'  =>  $meja
        );
           return view('user/meja',$session);
    }
    public function ruang()
    {
        $nim        = session('nim');
        $user       = Peminjam::where('username',$nim)->get();
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim'),
            'user'  =>  $user
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
    public function cart()
    {
        $nim        =   session('nim');
        $peminjam   =   Peminjam::where('username',$nim)->get();
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'status'        =>  "Proses"
        );
        $pinjamAlat =   PinjamAlat::where($kondisi)->get();
        $session    =   array(
            'nama'          =>  session('nama'),
            'nim'           =>  session('nim'),
            'peminjam'      =>  $peminjam,
            'pinjamAlat'    =>  $pinjamAlat,
            'count'         =>  count($pinjamAlat)
        );

        return view('user/alat/cart',$session);
    }
    public function cart_batal_1($id)
    {
        $nim        =   session('nim');
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'status'        =>  "Proses",
            'id'            =>  $id
        );
        $session    =   array(
            'nama'          =>  session('nama'),
            'nim'           =>  session('nim'),
        );
        PinjamAlat::where($kondisi)->update([
            'status'    =>  "Batal"
        ]);
        return redirect()->back()->with("batal","Berhasil menghapus alat dari keranjang");
    }
    public function tambahKeranjang(Request $request,$id)
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        $nim        =   session('nim');
        $cekAlat    =   array(
            'id_alat'       =>  $id,
            'id_peminjam'   =>  $nim,
            'status'        =>  "Proses"
        );
        $cek            =   PinjamAlat::where($cekAlat)->get();
        if(count($cek) > 0){
            foreach($cek as $alat_){
            PinjamAlat::where($cekAlat)->update([
                'jumlah'    =>  ($alat_->jumlah)+($request['Jumlah']),
                'status'    =>  "Proses"
            ]);
            $alatNew    =   Alat::where('id',$id)->get();
            foreach($alatNew as $alatNew){
                Alat::where('id',$id)->update([
                    'stok'    =>  ($alatNew->stok)-($request['Jumlah'])
                ]);
            }
        }
        }else{
        $alat       =   Alat::where('id',$id)->get();
        foreach($alat as $alat){
            PinjamAlat::create([
                'id_alat'       =>  $id,
                'nama_alat'     =>  $alat->nama,
                'id_peminjam'   =>  $nim,
                'jumlah'        =>  $request['Jumlah'],
                'status'        =>  "Proses"
            ]);
        }
        }


        return redirect('/user/alat/cart');
    }
    public function pinjamAlat(Request $request)
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        $nim        =   session('nim');
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'status'        =>  "Proses"
        );
        Peminjam::where('username',$nim)->update([
            'no_hp'     =>  $request['nohp'],
            'alamat'    =>  $request['alamat']
        ]);
        PinjamAlat::where($kondisi)->update([
            'kegunaan'      =>  $request['kegunaan'],
            'tgl_pinjam'    =>  $request['pinjam'],
            'tgl_kembali'   =>  $request['kembali'],
            'keterangan'    =>  $request['keterangan'],
            'status'        =>  "Belum"
        ]);
        return redirect('/user')->with('sukses',"Peminjaman alat sedang diproses");
    }
    public function cartbatal()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        $nim        =   session('nim');
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'status'        =>  "Proses"
        );
        PinjamAlat::where($kondisi)->update([
            'status'        =>  "Batal"
        ]);
        return redirect('/user/alat')->with('sukses','Pembatalan peminjaman alat berhasil');
    }
    public function ruangPinjam(Request $request)
    {
        // dd($request->all());
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        $nim            =   session('nim');
        $kondisi        =   array(
            'id_peminjam'   =>  $nim,
            'kegunaan'      =>  $request['kegunaan']
        );
        $ruangCek       =   Ruang::where($kondisi)->get();
        if(count($ruangCek)==0){
            Peminjam::where('username',$nim)->update([
                'no_hp'     =>  $request['no_hp'],
                'alamat'    =>  $request['alamat']
            ]);
            Ruang::create([
                'id_peminjam'   =>  $nim,
                'kegunaan'      =>  $request['kegunaan'],
                'tgl_pinjam'    =>  $request['pinjam'],
                'keterangan'    =>  $request['keterangan'],
                'status'        =>  "Belum"
            ]);
            return redirect('/user')->with('sukses','Peminjaman Ruang sedang diproses');
        }else{
            return redirect()->back()->with('gagal','Anda telah meminjam ruang untuk'.$request['kegunaan']);
        }
    }

}
