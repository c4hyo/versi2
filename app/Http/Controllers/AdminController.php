<?php

namespace App\Http\Controllers;

use PDF;
use File;
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
use Illuminate\Support\Facades\Input;

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
        $praktikum  =   Ruang::where('id_peminjam','Admin')->where('status','Sudah')->get();
        $peminjaman =   viewruang::get();
        $online     = Peminjam::where('status','Online')->get();
        $session = array(
            'nama'      => session('nama'),
            'user'      => session('user'),
            'meja'      => count(Meja::where('status','belum')->get()),
            'alat'      => count(Alat::where('stok','<>','0')->get()),
            'posting'   => count(Posting::where('status','<>','Batal')->get()),
            'online'    => $online,
            'praktikum'     =>  $praktikum,
            'peminjaman'    =>  $peminjaman
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
            'Ruang'     =>  $viewRuang,
            'cntMeja'   =>  count(Meja::where('status','<>','belum')->get())
        );
        return view('admin/peminjaman',$session);
    }
    public function pengaturan()
    {
        $user       =   Peminjam::get();
        $alat       =   viewalat::
                        where('status','Batal')->get();
        $admin      =   Admin::get();
        $ruang      =   viewruang::where('status','Batal')->get();
        // dd(count($ruang));
        $session    = array(
            'mhs'       =>  $user,
            'nama'      =>  session('nama'),
            'user'      =>  session('user'),
            'alat'      =>  $alat,
            'ruang'     =>  $ruang,
            'admin'     =>  $admin
        );
        return view('admin/pengaturan',$session);
    }
    public function pengelolaan()
    {
        $alat       =   Alat::get();
        $session = array(
            'nama'  =>  session('nama'),
            'user'  =>  session('user'),
            'alat'  =>  $alat
        );
        return view('admin/kelola',$session);
    }
     public function posting()
    {
        $posting    =   Posting::where('status','<>','Batal')->get();
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
        $praktikum      =   Praktikum::get();
        $ruang          =   Ruang::where('id_peminjam','Admin')->where('status','Sudah')->get();
        $session = array(
            'nama'      =>  session('nama'),
            'user'      =>  session('user'),
            'prak'      =>  $praktikum,
            'jadwal'    =>  $ruang,
            'prak1'     =>  $praktikum
        );
        return view('admin/praktikum',$session);
    }
    public function prakAdd(Request $request)
    {
        $kondisi        =   array(
            'kegunaan'  =>  $request['nama'],
            'tema'     =>  "Modul ".$request['modul']
        );
        $cek            = Ruang::where($kondisi)->get();
        if(count($cek) > 0){
            // dd(count($cek));
            return redirect()->back()->with('gagal',"Praktikum ".$request['nama']." modul ".$request['modul']." sudah diatur sebelumnya");
        }else{
        $praktikum      = Ruang::create([
            'id_peminjam'   =>      "Admin",
            'kegunaan'      =>      $request['nama'],
            'tema'          =>      "Modul ".$request['modul'],
            'tgl_pinjam'    =>      $request['tgl'],
            'keterangan'    =>      $request['judul'],
            'status'        =>      "Belum"
        ]);
            return redirect()->back()->with('sukses',"Praktikum ".$request['nama']." modul ".$request['modul']." sudah diatur");
        }

    }

    function detailPrak($slug)
    {

        $praktikum  =   Praktikum::where('slug',$slug)->get();
        foreach($praktikum as $prak){
        $jadwal     =   Ruang::where('kegunaan',$prak->nama)->where('id_peminjam','Admin')->orderBy('tema','ASC')->get();
        $session = array(
            'nama'      =>  session('nama'),
            'user'      =>  session('user'),
            'prak'      =>  $praktikum,
            'jadwal'    =>  $jadwal
        );
    }
        return view('admin/praktikum/detail',$session);
    }
    public function editPrak($id,Request $request)
    {
        $kondisi    =   Ruang::where('tgl_pinjam',$request['tgl'])->where('id_peminjam','<>','Admin')->get();
        if(count($kondisi)== 0){
       $edit    = Ruang::where('id',$id)->update([
            'keterangan'    =>  $request['judul'],
            'tgl_pinjam'    =>  $request['tgl'],
       ]);
        return redirect()->back()->with('sukses','Berhasil diubah');
       }else{
           $edit    = Ruang::where('id',$id)->update([
            'keterangan'    =>  $request['judul'],
            'tgl_pinjam'    =>  $request['tgl'],
       ]);
       Ruang::where('tgl_pinjam',$request['tgl'])->where('id_peminjam','<>','Admin')->update([
           'status'    =>  'Batal'
           ]);
           return redirect()->back()->with('sukses','Berhasil diubah');

       }
    }
    public function prakAktif($judul)
    {
       Praktikum::where('nama',$judul)->update([
            'status'     =>  "Sudah"
       ]);
       Ruang::where('kegunaan',$judul)->update([
            'status'    =>  "Sudah"
       ]);
        return redirect()->back()->with('sukses', 'Praktikum '.$judul.' sudah aktif');
    }
    public function prakNonAktif($judul)
    {
       Praktikum::where('nama',$judul)->update([
            'status'     =>  "Belum"
       ]);
       Ruang::where('kegunaan',$judul)->update([
            'status'    =>  "Belum"
       ]);
        return redirect()->back()->with('gagal', 'Praktikum '.$judul.' sudah berakhir');
    }
    public function prakKonten(Request $request,$judul)
    {
        $gambar     = Input::file('gambar');
        if($gambar != null){
            Praktikum::where('nama',$judul)->update([
            'keterangan'    =>  $request['posting'],
            'gambar'        =>  url('img').'/praktikum/'.$gambar->getClientOriginalName()
            ]);
            $gambar->move('img/praktikum',$gambar->getClientOriginalName());
            return redirect()->back()->with('sukses','Konten praktikum '.$judul.' sudah diatur');
        }else{
            Praktikum::where('nama',$judul)->update([
            'keterangan'    =>  $request['posting']
            ]);
             return redirect()->back()->with('sukses','Konten praktikum '.$judul.' sudah diatur tanpa gambar');
        }
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
    public function setUser()
    {
        $user = Peminjam::all();
        return Datatables::of($user)
        ->addColumn('aksi',function($user){
            // return "<a href=#".$user->username." class='btn btn-danger'><span class='glyphicon glyphicon-cog'></span></a>";
        })->make(true);
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
    public function alatTerima($nim,$pinjam,$kembali)
    {
       $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $kondisi    =   array(
            'id_peminjam'   =>  $nim,
            'tgl_pinjam'    =>  $pinjam,
            'tgl_kembali'   =>  $kembali,
            'status'        =>  "P Kembali"
        );
        PinjamAlat::where($kondisi)->update([
            'status'        =>  "Terima"
        ]);
        return redirect()->back()->with('sukses','Alat sudah dikembalikan');
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
        $peminjam       =   Peminjam::where('username',$nim)->get();
        foreach($peminjam as $peminjam){
            File::delete($peminjam->ktm);
            $ktm    =   str_replace(url('').'/','',$peminjam->ktm);
            $foto   =   str_replace(url('').'/','',$peminjam->foto);
            unlink($ktm);
            unlink($foto);

        }
        Ruang::where($kondisi)->update([
            'status'        =>  "Sudah"
        ]);
        Peminjam::where('username',$nim)->update([
            'ktm'       =>  null,
            'foto'      =>  null
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
        $peminjam       =   Peminjam::where('username',$nim)->get();
        foreach($peminjam as $peminjam){
            File::delete($peminjam->ktm);
            $ktm    =   str_replace(url('').'/','',$peminjam->ktm);
            $foto   =   str_replace(url('').'/','',$peminjam->foto);
            unlink($ktm);
            unlink($foto);

        }
        Ruang::where($kondisi)->update([
            'status'        =>  "Batal"
        ]);
        Peminjam::where('username',$nim)->update([
            'ktm'       =>  null,
            'foto'      =>  null
        ]);
        return redirect()->back()->with('gagal','Peminjaman ruang dibatalkan');
    }
    public function postShow($id)
    {
        Posting::where('id',$id)->update([
            'status'    =>  "Sudah",
            'waktu'     =>  now(+7)
        ]);
        return redirect()->back()->with('sukses','Posting telah dipublikasikan');
    }
    public function postDont($id)
    {
       Posting::where('id',$id)->update([
            'status'    =>  "Belum",
            'waktu'     =>  now(+7)
        ]);
        return redirect()->back()->with('gagal','Posting tidak ditampilkan');
    }
    public function postDel($id)
    {
        Posting::where('id',$id)->update([
            'status'    =>  "Batal",
            'waktu'     =>  now(+7)
        ]);
        return redirect()->back()->with('gagal','Posting telah dihapus');
    }
    public function postEdit(Request $request,$id)
    {
        $judul      =   $request['judul'];
        $slug       =   strtolower(str_replace(" ", "-", $judul));
        $posting    =   $request['posting'];
        Posting::where('id',$id)->update([
            'judul'     =>  $judul,
            'slug'      =>  $slug,
            'posting'   =>  $posting,
            'waktu'     =>  now(+7)
        ]);
        return redirect()->back()->with('sukses',$judul .' berhasil diubah');
    }
    public function alatAdd(Request $request)
    {
         $session = array(
            'nama'  => session('nama'),
            'user'  => session('user'),
        );
        $gambar = Input::file('gambar');
        if($gambar != null){
            Alat::create([
                'nama'      =>  $request['nama'],
                'stok'      =>  $request['stok'],
                'satuan'    =>  $request['satuan'],
                'merk'      =>  $request['merk'],
                'keterangan'=>  $request['ket'],
                'gambar'    =>  url('img').'/alat/'.$gambar->getClientOriginalName()
            ]);
            $gambar->move('img/alat',$gambar->getClientOriginalName());
            return redirect()->back()->with('sukses','Alat berhasil ditambahkan');
        }else{
            Alat::create([
                'nama'      =>  $request['nama'],
                'stok'      =>  $request['stok'],
                'satuan'    =>  $request['satuan'],
                'merk'      =>  $request['merk'],
                'keterangan'=>  $request['ket'],
                'gambar'    =>  null
            ]);
            return redirect()->back()->with('sukses','Alat berhasil ditambahkan');
        }
    }
    public function alatDel($id)
    {
        Alat::where('id',$id)->delete();
        return redirect()->back()->with('gagal','Alat berhasil dihapus');
    }
    public function alatUbah(Request $request,$id)
    {
        $gambar = Input::file('gambar');
        if($gambar != null){
            Alat::where('id',$id)->update([
                'nama'      =>  $request['nama'],
                'stok'      =>  $request['stok'],
                'satuan'    =>  $request['satuan'],
                'merk'      =>  $request['merk'],
                'keterangan'=>  $request['ket'],
                'gambar'    =>  url('img').'/alat/'.$gambar->getClientOriginalName()
            ]);
            $gambar->move('img/alat',$gambar->getClientOriginalName());
            return redirect()->back()->with('sukses','Data alat berhasil diubah');
        }else{
            Alat::where('id',$id)->update([
                'nama'      =>  $request['nama'],
                'stok'      =>  $request['stok'],
                'satuan'    =>  $request['satuan'],
                'merk'      =>  $request['merk'],
                'keterangan'=>  $request['ket'],
            ]);
            return redirect()->back()->with('sukses','Data alat berhasil diubah');
        }
    }
    public function mejaSetuju($id)
    {
        $kondisi        = array(
            'id'        =>  $id,
            'status'    =>  'Proses'
        );
        Meja::where($kondisi)->update([
            'status'    =>  "Sudah"
        ]);
        return redirect()->back()->with('sukses','Peminjaman meja disetujui');
    }
    public function mejaBatal($id)
    {
        $kondisi        = array(
            'id'        =>  $id
        );
        Meja::where($kondisi)->update([
            'username'  =>  null,
            'nama'      =>  null,
            'status'    =>  "Belum"
        ]);
        return redirect()->back()->with('gagal','Peminjaman meja dibatalkan');
    }
    public function delAlat()
    {
        PinjamAlat::where('status','Batal')->delete();
        return redirect()->back()->with('gagal','Berhasil di hapus');
    }
    public function delRuang()
    {
        Ruang::
        where('status','Batal')->
        where('id_peminjam','<>','Admin')->
        delete();
        return redirect()->back()->with('gagal','Berhasil di hapus');
    }
    public function delPosting()
    {
       Posting::where('status','Batal')->delete();
       return redirect()->back()->with('gagal','Berhasil di hapus');
    }
    public function resetPass($id)
    {
       Peminjam::where('username',$id)->update([
        'password'  =>  bcrypt('00000000')
       ]);
       return redirect()->back()->with('gagal','Kata Sandi berhasil di reset');
    }
    public function editProfil(Request $request,$user)
    {
        // dd($request->all());
        Admin::where('user',$user)->update([
            'nama'  =>  $request['nama'],
            'user'  =>  $request['user']
        ]);
        // session()->flush();
        return redirect()->back()->with('sukses','Profil berhasil diubah');
    }
    public function editPass(Request $request,$user)
    {
        $pass       =   $request['pass'];
        Admin::where('user',$user)->update([
            'password'  => bcrypt("$pass")
        ]);
        // session()->flush();
        return redirect()->back()->with('sukses','Profil berhasil diubah');
    }
    public function delRng()
    {
        $ruang  =   viewruang::where('status','Batal')->get();
        return Datatables::of($ruang)->make(true);
    }
    public function delAlt()
    {
        $alat   =   viewalat::where('status','Batal')->get();
        return Datatables::of($alat)->make(true);
    }
    public function delPost()
    {
       $posting     =   posting::where('status','Batal')->get();
       return Datatables::of($posting)->make(true);
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'csv'  =>  'required|mimes:csv,txt'
        ]);
        if(Input::file('csv') == null){
            return redirect()->back()->with('gagal','FILE CSV TIDAK DITEMUKAN');
        }else{
            if(($handle = fopen(Input::file('csv'),"r")) !== FALSE){
                while(($data = fgetcsv($handle,1000,','))!== FALSE){
                    Peminjam::create([
                        'nama'      =>  $data[0],
                        'username'  =>  $data[1]
                    ]);
                }
                fclose($handle);
                return redirect()->back()->with('sukses','Berhasil menambahkan pengguna');
            }
        }
    }
    public function unduhAlat(Request $request)
    {
        $awal       =   $request['awal'];
        $akhir      =   $request['akhir'];
        $request->validate([
                'akhir' 		=>'required|after:awal',
        ]);
        $alat   =   viewalat::whereBetween('tgl_pinjam',[$request['awal'],$request['akhir']])->orderBy('tgl_pinjam','asc')->get();
        $data   =   [
            'awal'      =>  $request['awal'],
            'akhir'     =>  $request['akhir'],
            'alat'      =>  $alat
        ];
        $pdf = PDF::loadView('admin/home/alat',$data)->setPaper('a4', 'potrait');
        return $pdf->download("Data Peminjaman Alat ($awal s/d $akhir).pdf");
    }
    public function unduhRuang(Request $request)
    {
        $awal       =   $request['awal'];
        $akhir      =   $request['akhir'];
        $request->validate([
                'akhir' 		=>'required|after:awal',
        ]);
        $ruang  =   viewruang::whereBetween('tgl_pinjam',[$request['awal'],$request['akhir']])->orderBy('tgl_pinjam','asc')->get();
         $data   =   [
            'awal'      =>  $request['awal'],
            'akhir'     =>  $request['akhir'],
            'ruang'      =>  $ruang
        ];
        $pdf = PDF::loadView('admin/home/ruang',$data)->setPaper('a4', 'potrait');
        return $pdf->download("Data Peminjaman Ruang ($awal s/d $akhir).pdf");
    }
}
