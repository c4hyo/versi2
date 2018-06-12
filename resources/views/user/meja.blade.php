@extends('layout.user')
@section('css')

@endsection
@section('konten')
	<title>Meja | {{$nama}}</title>
    <div class="row">
    @foreach($meja as $meja)
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
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
                                <i class="fa fa-plus-circle fa-5x"></i>
                            </div>
                            <div class="col-sm-7">
                                <div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
                                <div><label>Belum&nbsp;di pinjam</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-top:0.2cm;padding-bottom:0.2cm;" class="panel-content">
                    <label></label>
                </div>
            </div>
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
