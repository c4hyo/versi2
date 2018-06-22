@extends('layout.admin')
@section('header')
<title>Admin | Praktikum</title>
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
    <div class="row">
    <a href="#addModul" class="btn btn-primary  pull-right" data-toggle="modal"><span class="fa fa-plus">&nbsp;Tambah Modul Praktikum</span></a>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                @foreach($prak as $prak)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label><a href="{{url('/bukanwp-admin/praktikum/'.$prak->slug)}}">{{$prak->nama}}</a></label><br>
                    <a href="{{url('/bukanwp-admin/praktikum/'.$prak->slug)}}">
                    @if($prak->gambar =="")
                    <img src="{{url('img/alat/not.png')}}" style="width:300px;height:300px" class="img-thumbnail">
                    @else
                    <img src="{{$prak->gambar}}" style="width:300px;height:300px" class="img-thumbnail">
                    @endif
                    </a>
                </div>
                @endforeach

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px">
                    <div class="thumbnail table-responsive">
                    <h3 align="center">Jadwal Praktikum</h3>
                        <table class="table table-bordered table-hover" id="prak">
                        <thead>
                            <tr>
                                <th>Praktikum</th>
                                <th>Judul Praktikum</th>
                                <th>Modul</th>
                                <th>Tanggal Praktikum</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $jadwal)
                            <tr>
                                <td>{{$jadwal->kegunaan}}</td>
                                <td>{{$jadwal->keterangan}}</td>
                                <td>{{$jadwal->tema}}</td>
                                <td>{{$jadwal->tgl_pinjam}}</td>
                                @if(date("Y-m-d")==$jadwal->tgl_pinjam)
                                <td><label class="label label-success">Sedang Berlangsung</label></td>
                                @elseif(date("Y-m-d")>$jadwal->tgl_pinjam)
                                <td><label class="label label-primary">Sudah Berlangsung</label></td>
                                @else
                                <td><label class="label label-danger">Belum Berlangsung</label></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModul">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Modul Praktikum</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/bukanwp-admin/praktikum')}}" method="post">
                    <div class="form-group">
                        <label class="label-control">Nama Praktikum</label>
                        <select class="form-control" required name="nama">
                            <option value="">--- PILIH PRAKTIKUM ---</option>
                        @foreach($prak1 as $praktikum)
                            <option value="{{$praktikum->nama}}">{{$praktikum->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label class="label-control">Judul Praktikum</label>
                        <input type="text" name="judul" class="form-control"  required  id="">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Modul Ke</label>
                        <input type="number" name="modul" class="form-control" max="8" required id="">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Tanggal Praktikum</label>
                        <input type="date" name="tgl" class="form-control" required id="">
                    </div>
                {{csrf_field()}}
            </div>
            <div class="modal-footer">
                    <input type="submit" class="form-control btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>

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
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js')
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#prak').DataTable({ })
});
</script>
@endsection
