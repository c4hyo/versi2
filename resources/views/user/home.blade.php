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
@section('nama')
	{{$nama}}
@endsection
@endsection
@section('js')

@endsection
@section('header')
	<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span></h1>

@endsection
