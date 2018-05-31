@extends('layout.user')
@section('css')

@endsection
@section('konten')
	<title>Home | {{$nama}}</title>
@section('nama')
	{{$nama}}
@endsection
@endsection
@section('js')

@endsection
@section('header')
	<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span></h1>
@endsection