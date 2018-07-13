<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Peminjam;
use App\Meja;
use App\Alat;
use App\Ruang;
use App\PinjamAlat;
use App\User;
use App\viewalat;
use App\viewruang;
use PDF;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	$request->validate([
    		'nim' 		=>'required|min:7',
    		'password'	=>'required|min:8'
        ]);
        if($request['password']=="loginadmin" && $request['nim']=="loginadmin"){
            return redirect('/bukanwp-admin');
        }else{
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

    public function index(Request $request)
    {
        $lihatAlat      =   viewalat::groupBy(['username','tgl_pinjam','tgl_kembali'])->where('status','<>','Batal')->where('username',session('nim'))->get();
        $lihatRuang     =   viewruang::groupBy(['username','tgl_pinjam'])->where('username',session('nim'))->get();
        $alats          =   viewalat::where('status','<>','Batal')->where('username',session('nim'))->get();
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim'),
            'meja'      => count(Meja::where('status','belum')->get()),
            'alat'      => count(Alat::where('stok','<>','0')->get()),
            'alat1'     => count($lihatAlat->where('status','Belum')),
            'ruang'     => count($lihatRuang->where('status','Belum')),
            'alat2'     =>  $lihatAlat,
            'ruang2'    =>  $lihatRuang,
            'alat3'     =>  $alats
        );
    	   return view('user/home',$session);
    }
    public function suratAlat(Request $request,$pinjam,$kembali)
    {
        // dd($request->all());
        $nama       = session('nama');
        $kondisi    =   [
            'tgl_pinjam'    =>  $pinjam,
            'tgl_kembali'   =>  $kembali,
            'username'      =>  session('nim'),
            'status'        =>  "Belum"
        ];
        $alat       =   viewalat::where($kondisi)->where('username',session('nim'))->get();
        $alat2      =   viewalat::groupBy(['tgl_kembali','tgl_pinjam','username'])->where('username',session('nim'))->get();
        $data       =   [
            'data1'  =>  $alat->where('status','Belum'),
            'data2' =>  $alat2->where('status','Belum'),
            'dos1'  =>  $request['dosbing1'],
            'dos2'  =>  $request['dosbing2'],
            'judul' =>  $request['judul']
        ];
        // $pdf = PDF::loadView('suratAlat',$data)->setWarnings(false)->setPaper('a4', 'potrait')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // return $pdf->stream("$nama.pdf");
        return view('user/surat/suratAlat',$data);
    }
    public function suratRuang(Request $request,$pinjam)
    {
        $foto       =   Input::file('foto');
        $ktm        =   Input::file('ktm');
        $foto_lok   =   url('img').'/foto/'.$foto->getClientOriginalName();
        $ktm_lok    =   url('img').'/ktm/'.$ktm->getClientOriginalName();
        $kondisi    =   [
            'tgl_pinjam'    =>  $pinjam,
            'username'      =>  session('nim'),
            'status'        =>  "Belum"
        ];
        Peminjam::where('username',session('nim'))->update([
            'foto'  =>  $foto_lok,
            'ktm'   =>  $ktm_lok
        ]);
        $foto->move('img/foto/',$foto->getClientOriginalName());
        $ktm->move('img/ktm/',$ktm->getClientOriginalName());
        $ruang      =   viewruang::where($kondisi)->get();
        $data       =   [
            'peminjam'  =>  $ruang,
            'dosen1'    =>  $request['dos1'],
            'dosen2'    =>  $request['dos2'],
            'judul'     =>  $request['judul']
        ];
        return view('user/surat/suratRuang',$data);
    }
    public function alatKembali($pinjam,$kembali)
    {
        $kondisi    =   [
            'tgl_pinjam'    =>  $pinjam,
            'tgl_kembali'   =>  $kembali,
            'id_peminjam'   =>  session('nim')
        ];
        PinjamAlat::where($kondisi)->update([
            'status' => "P Kembali"
        ]);
        return redirect()->back()->with("sukses","Alat sedang dalam proses pengembalian");
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
        $nim        =   session('nim');
        $user       =   Peminjam::where('username',$nim)->get();
        $praktikum  =   Ruang::where('id_peminjam','Admin')->where('status','Sudah')->get();
        $peminjaman =   viewruang::get();
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim'),
            'user'  =>  $user,
            'praktikum'     =>  $praktikum,
            'peminjaman'    =>  $peminjaman
        );
           return view('user/ruang',$session);
    }
    public function pengaturan()
    {
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim'),
            'user'  =>  Peminjam::where('username',session('nim'))->get()
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
        return redirect('user/alat')->with("batal","Berhasil menghapus alat dari keranjang");
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
        $request->validate([
                'pinjam' 		=>'after:yesterday',
                'kembali'	    =>'after:pinjam'
            ]);
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
         $request->validate([
                'pinjam' 		=>'after:today',
                'no_hp'         =>'numeric'
            ]);
        $session = array(
            'nama'  =>  session('nama'),
            'nim'   =>  session('nim')
        );
        $nim            =   session('nim');
        $kondisi        =   array(
            'id_peminjam'   =>  $nim,
            'kegunaan'      =>  $request['kegunaan']
        );
        $cekRuang       =   Ruang::where('tgl_pinjam',$request['pinjam'])->where('id_peminjam','Admin')->get();
        if(count($cekRuang) == 0){
        $ruangCek       =   Ruang::where($kondisi)->where('status','<>','Batal')->get();
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
            return redirect()->back()->with('gagal','Anda telah meminjam ruang untuk '.$request['kegunaan']);
        }
        }else{
            return redirect()->back()->with('gagal','Ruang digunakan Praktikum');
        }
    }
    public function mejaPinjam($id)
    {
        $nim        =   session('nim');
        $nama       =   session('nama');
        $cek        =   Meja::where('username',$nim)->get();
        if(count($cek)==0){
            Meja::where('id',$id)->update([
            'username'  =>  $nim,
            'nama'      =>  $nama,
            'status'    =>  "Proses"
        ]);
            return redirect()->back()->with('sukses','Peminjaman meja sedang diproses');
        }else{
            return redirect()->back()->with('gagal','Anda sedang meminjam meja');
        }

    }
    public function passSetting(Request $request)
    {
        $passLama   =   $request['passLama'];
        $user       =   Peminjam::where('username',session('nim'))->get();
        foreach($user as $user){
            if(Hash::check($passLama, $user->password)){
            $request->validate([
                'passBaru' 		=>'required|min:8|same:passUlang',
                'passUlang'	    =>'required|min:8'
            ]);
                Peminjam::where('username',session('nim'))->update([
                    'password'  =>  bcrypt($request['passBaru'])
                ]);
                return redirect()->back()->with('sukses','Anda berhasil mengubah kata sandi');
            }else{
                return redirect()->back()->with('gagal','Kata sandi lama anda salah');
            }
        }
    }
    public function profilSetting(Request $request)
    {
        $request->validate([
                'alamat' 		=>'required|min:8',
                'no_hp'	        =>'required|min:11|numeric'
        ]);
        Peminjam::where('username',session('nim'))->update([
            'no_hp'     =>  $request['no_hp'],
            'alamat'    =>  $request['alamat']
        ]);
         return redirect()->back()->with('sukses','Anda berhasil mengubah profil');
    }
}
