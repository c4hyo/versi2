@extends('layout.user')
@section('css')

@endsection
@section('konten')
	<title>Home | {{$nama}}</title>
     <div style="margin-top:50px;">
        @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
     </div>
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div style="background:#00695c ;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$meja}}</h3>
              <p>Meja Tersedia</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div style="background:#9e9d24;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$alat}}</h3>
              <p>Alat Tersedia</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div style="background:#d32f2f  ;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$alat1}}</h3>
              <p>Cetak Surat Alat</p>
            </div>
            <div class="icon">
              <i class="fa fa-print"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div style="background:#1565c0  ;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$ruang}}</h3>
              <p>Cetak Surat Ruang</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     </div>
     <div class="container">
         <h1 align="center">Peminjaman</h1>
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3>Alat</h3>
             <div class="table-responsive thumbnail">
                     <table class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                        @foreach($alat2 as $alatPinjam)
                        <tr>
                            <td>{{$alatPinjam->tgl_pinjam}}</td>
                            <td>{{$alatPinjam->tgl_kembali}}</td>
                            <td>{{$alatPinjam->status}}</td>
                            @if($alatPinjam->status =="Sudah")
                            <td>
                                <a href="#show{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-default"><span class="fa fa-search"></span></a>
                                @include('user.home.show')

                                <a href="{{url('/user/home/kembali/'.$alatPinjam->tgl_pinjam.'/'.$alatPinjam->tgl_kembali)}}" class="btn btn-primary"><span class="fa fa-arrow-left"></span></a>
                            </td>
                            @elseif($alatPinjam->status == "Belum")
                            <td>
                                <a href="#show{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-default"><span class="fa fa-search"></span></a>
                                @include('user.home.show')
                                <a href="#alat{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-success"><span class="fa fa-print"></span></a>
                                @include('user.home.alat')
                            </td>
                            @elseif($alatPinjam->status == "P Kembali")
                            <td>
                                <a href="#show{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-success"><span class="fa fa-search"></span></a>
                                @include('user.home.show')
                            </td>
                            @elseif($alatPinjam->status == "Terima")
                            <td>
                                <a href="#show{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-success"><span class="fa fa-search"></span></a>
                                @include('user.home.show')
                                <a class="btn btn-success" disabled><span class="fa fa-check"></span></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3>Ruang</h3>
             <div class="table-responsive thumbnail">
                     <table class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                <th>Tanggal</th>
                                <th>Kegunaan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($ruang2 as $ruangPinjam)
                            <tr>
                            <td>{{$ruangPinjam->tgl_pinjam}}</td>
                            <td>{{$ruangPinjam->kegunaan}}</td>
                            <td>{{$ruangPinjam->status}}</td>
                            @if($ruangPinjam->status == "Sudah")
                            <td><a class="btn btn-warning" disabled><span class="fa fa-check"></span></a></td>
                            @elseif($ruangPinjam->status =="Belum")
                            <td><a href="#ruang{{$ruangPinjam->tgl_pinjam}}" data-toggle="modal" class="btn btn-success"><span class="fa fa-print"></span></a></td>
                            @include('user.home.ruang')
                            @endif
                            </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
@section('nama')
	{{$nama}}
@endsection
@endsection
@section('js')

@endsection
@section('header')
	<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span></h1>

@endsection
