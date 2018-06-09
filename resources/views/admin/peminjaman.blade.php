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
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#meja" data-toggle="tab"><span class="fa fa-table">&nbsp;</span>Peminjam Meja</a></li>
                <li><a href="#alat" data-toggle="tab"><span class="fa fa-wrench">&nbsp;</span>Peminjam Alat</a></li>
                <li><a href="#ruang" data-toggle="tab"><span class="fa fa-home">&nbsp;</span>Peminjam Ruangan</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="tab-content">
    @include('admin.peminjam.meja')
    @include('admin.peminjam.alat')
    @include('admin.peminjam.ruang')
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js')
<script>
    $(function () {
        $('#pinjamAlat').DataTable({
            processing 	: 	true,

        })
        $('#pinjamRuang').DataTable({
            processing 	: 	true,

        })
    });
</script>
@endsection
