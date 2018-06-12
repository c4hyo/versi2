@extends('layout.user')
@section('css')

@endsection
@section('konten')
	<title>Keranjang | {{$nama}}</title>
    <div class="row">
        <center>
        <h2>Keranjang</h2>
        <h4>{{$nama."(".$nim.")"}}</h4>
        </center>
        <div style="margin-bottom:30px;"></div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <form action="{{url('/user/alat/cart')}}" method="post">
            @foreach($peminjam as $peminjam)
                <div class="form-group">
                    <label for="" class="label-control">Nama Peminjam</label>
                    <input type="text" name="nama" class="form-control" value="{{$nama}}" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="label-control">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{$nim}}" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Nomor Handphone</label>
                    <input type="text" name="nohp" class="form-control" value="{{$peminjam->no_hp}}" required>
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Alamat</label>
                    <textarea required name="alamat" class="form-control" cols="30" rows="5">{{$peminjam->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Kegunaan</label>
                    <select name="kegunaan" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="Praktikum">Praktikum</option>
                        <option value="Penelitian">Penelitian</option>
                        <option value="Tugas Akhir">Tugas Akhir</option>
                    </select>
                </div>
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                            <th>Batal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($pinjamAlat as $pinjamAlat)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pinjamAlat->nama_alat}}</td>
                            <td>{{$pinjamAlat->jumlah}}</td>
                            <td>
                                <a href="{{url('/user/alat/cart/'.$pinjamAlat->id.'/batal')}}" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($count > 1)
                <a href="{{url('/user/alat/cart/batal')}}" class="form-control btn btn-danger">Batal Semua</a>
                @else
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-offset-0 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="" class="label-control">Tanggal Pinjam</label>
                <input type="date" name="pinjam" class="form-control" id="pinjam" required>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Tanggal Kembali</label>
                <input type="date" name="kembali" class="form-control"id="kembali" required>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Keterangan</label>
                <textarea name="keterangan" class="form-control" cols="30" rows="5" required></textarea>
            </div>
            {{csrf_field()}}
            <div>
                <button type="submit" class="btn btn-primary form-control" >Pinjam</button>
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
	<!-- <h1><span class="pull-right"></span></h1> -->
    @if(session('batal'))
      <div class="alert alert-success">
          <p align="center">{{ session('batal') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
@endsection
