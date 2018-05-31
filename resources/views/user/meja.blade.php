@extends('layout.user')
@section('css')

@endsection
@section('konten')
	<title>Meja | {{$nama}}</title>

@section('nama')
	{{$nama}}
@endsection
@endsection
@section('js')

@endsection
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span class="">Peminjaman Meja Tugas Akhir</span></h1>
@endsection