@extends('layout.guest')
@section('css')

@endsection
@section('konten')
<div class="row">
@foreach($yes as $posting)
<title>{{$posting->nama}}</title>
    <div class="col-xd-12 col-sm-8 col-md-8 col-lg-8">
        <h1>
            {{$posting->nama}}
        </h1>
        <div class="thumbnail">
            <img src="{{$posting->gambar}}" class="img-thumbnail" style="width:500px;height:400px">
        <p>
            {!!$posting->keterangan!!}
        </p>
        </div>
    </div>
@endforeach

    <div class="col-sm-4 col-xd-12 col-md-4 col-lg-4">
    <h3>Praktikum yang lain</h3>
     <div class="box-body">
        <ul class="products-list product-list-in-box">
            @foreach($no as $post)
            <li class="item"><a href="{{url('/praktikum/'.$post->slug)}}">&nbsp;&nbsp;{{$post->nama}}</a></li>
            @endforeach
        </ul>
    </div>

</div>
@endsection
@section('js')

@endsection
@section('navbar')
<li class=""><a href="{{url('/kegiatan')}}">Kegiatan</a></li>
<li class=""><a href="{{url('/alat')}}">Daftar Alat Lab</a></li>
<li class=""><a href="{{url('/langkah-peminjaman')}}">Langkah Peminjaman</a></li>
@endsection
