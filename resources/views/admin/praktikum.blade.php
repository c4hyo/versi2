@extends('layout.admin')
@section('header')
<title>Admin | Praktikum</title>
@endsection
@section('konten')
@include('admin.praktikum.sisdig')
<hr>
@include('admin.praktikum.tip')
<hr>
@include('admin.praktikum.tm')
<hr>
@include('admin.praktikum.sdl')
<hr>
@include('admin.praktikum.robotik')
<hr>
@endsection
@section('css')
<style>
    hr {
    border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}
</style>
@endsection
