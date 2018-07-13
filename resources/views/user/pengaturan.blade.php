@extends('layout.user')
@section('css')

@endsection
@section('konten')
 @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
	<title>Pengaturan | {{$nama}}</title>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h3 align="center">Kata Sandi</h3>
            <form action="{{url('/user/pengaturan/pass')}}" method="post">
                <div class="form-group">
                <label for="">Kata sandi lama</label>
                <input type="password" name="passLama" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Kata sandi baru</label>
                <input type="password" name="passBaru" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Ulangi kata sandi</label>
                <input type="password" name="passUlang" class="form-control">
                </div>
                {{csrf_field()}}
                <div class="form-group">
                <input  type="submit" value="Ubah" class="btn btn-info form-control">
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h3 align="center">Profil</h3>
            <form action="{{url('/user/pengaturan/profil')}}" method="post">
                <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" value="{{$nama}}" disabled>
                </div>
                <div class="form-group">
                <label for="">NIM</label>
                <input type="text" class="form-control" value="{{$nim}}" disabled>
                </div>
                @foreach($user as $user)
                <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input type="text" name="no_hp" class="form-control"required value="{{$user->no_hp}}">
                </div>
                <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="4" required class="form-control">{{$user->alamat}}</textarea>
                </div>
                @endforeach
                {{csrf_field()}}
                <div class="form-group">
                <input  type="submit" value="Ubah" class="btn btn-info form-control">
                </div>
            </form>
        </div>
    </div>
@section('nama')
{{$nama}}
@endsection
@endsection
@section('js')

@endsection
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span>Pengaturan Akun</span></h1>
@endsection
