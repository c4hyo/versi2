@extends('layout.user')
@section('css')

@endsection
@section('konten')
	<title>Meja | {{$nama}}</title>
    @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
    <div class="row">
    @foreach($meja as $meja)
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
            @if($meja->status =="Belum")
            <div class="panel panel-default">
                <div class="panel-heading"
                    style="
                    border-color:#d32f2f ;
                    color:white;
                    background-color:#d32f2f ;
                    "
                >
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-5">
                                <i style="margin-left:5px" class="fa fa-plus-circle fa-5x"></i>
                            </div>
                            <div class="col-sm-7">
                                <div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
                                <div><label>Belum&nbsp;di pinjam</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-top:10px;padding-bottom:10px;" class="panel-content">
                    <label><a href="{{url('/user/meja/pinjam/'.$meja->id)}}">Pinjam Sekarang &nbsp;<span class="fa fa-hand-o-right"></span></a></label>
                </div>
            </div>
            @elseif($meja->status =="Proses")
            <div class="panel panel-default">
                <div class="panel-heading"
                    style="
                    border-color:#9e9d24 ;
                    color:white;
                    background-color:#9e9d24 ;
                    "
                >
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-5">
                                <i style="margin-left:5px" class="fa fa-refresh fa-5x"></i>
                            </div>
                            <div class="col-sm-7">
                                <div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
                                <div><label>Belum&nbsp;di pinjam</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-top:10px;padding-bottom:10px;" class="panel-content">
                    <label>Sedang di proses</label>
                </div>
            </div>
            @elseif($meja->status =="Sudah")
            <div class="panel panel-default">
                <div class="panel-heading"
                    style="
                    border-color:green ;
                    color:white;
                    background-color:green ;
                    "
                >
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-5">
                                <i style="margin-left:5px" class="fa fa-check-circle fa-5x"></i>
                            </div>
                            <div class="col-sm-7">
                                <div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
                                <div><label>Belum&nbsp;di pinjam</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-top:10px;padding-bottom:10px;" class="panel-content">
                    <label>{{$meja->nama}}</label>
                </div>
            </div>
        @endif
        </div>
    @endforeach
    </div>
@section('nama')
	{{$nama}}
@endsection
@endsection
@section('js')

@endsection
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span class="">Peminjaman Meja Tugas Akhir</span></h1>
@endsection
