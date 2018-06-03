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
 <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#meja" data-toggle="tab"><span class="fa fa-table">&nbsp;</span>Peminjam Meja</a></li>
        <li><a href="#alat" data-toggle="tab"><span class="fa fa-wrench">&nbsp;</span>Peminjam Alat</a></li>
        <li><a href="#ruang" data-toggle="tab"><span class="fa fa-home">&nbsp;</span>Peminjam Ruangan</a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="active tab-pane" id="meja">
        <p>MEJA</p>
    </div>
    <div class="tab-pane" id="alat">
        <p>Alat</p>
    </div>
    <div class="tab-pane" id="ruang">
        <p>Ruang</p>
    </div>
</div>
@endsection
