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
@endsection
