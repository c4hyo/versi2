@extends('layout.admin')
@section('header')
<title>Admin | Peminjam</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-xd-12 col-sm-6 col-md-4 col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-table"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Peminjam Meja</span>
              <h4><span class="label label-success">0</span></h4>
              <span class="info-box-text">Orang</span>
            </div>
          </div>
        </div>
        <div class="col-xd-12 col-sm-6 col-md-4 col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-wrench"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Peminjam Alat</span>
              <h4><span class="label label-primary">0</span></h4>
              <span class="info-box-text">Orang</span>
            </div>
          </div>
        </div>
        <div class="col-xd-12 col-sm-6 col-md-4 col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-home"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Peminjam Ruang</span>
              <h4><span class="label label-warning">0</span></h4>
              <span class="info-box-text">Orang</span>
            </div>
          </div>
        </div>
    </div>
</div>
<center><h1>Daftar Peminjam</h1></center>
 <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#meja" data-toggle="tab"><span class="fa fa-table">&nbsp;</span>Peminjam Meja</a></li>
        <li><a href="#alat" data-toggle="tab"><span class="fa fa-wrench">&nbsp;</span>Peminjam Alat</a></li>
        <li><a href="#ruang" data-toggle="tab"><span class="fa fa-home">&nbsp;</span>Peminjam Ruangan</a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="active tab-pane" id="meja">
        <h2 align="center">Meja</h2>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="table-responsive thumbnail">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Meja</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($meja as $meja)
                            <tr>
                                <td>{{$meja->id}}</td>
                                @if($meja->username == null)
                                <td>{{"---"}}</td>
                                <td>{{"---"}}</td>
                                <td>{{$meja->status}}</td>
                                <td></td>
                                @else
                                <td>{{$meja->nama}}</td>
                                <td>{{$meja->username}}</td>
                                <td></td>
                                <td>
                                    <div><a href=""></a></div>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="alat">
        <p>Alat</p>
    </div>
    <div class="tab-pane" id="ruang">
        <p>Ruang</p>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js')

@endsection
