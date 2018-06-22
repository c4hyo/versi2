@extends('layout.admin')
@section('header')
<title>Admin | Pengelolaan</title>
<h1>Pengelolaan Alat Laboratorium</h1>
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
    <div class="container-fluid" style="margin-bottom:30px;">
        <a href="#AddAlat" data-toggle="modal" class="btn btn-primary pull-right"><i class="fa fa-plus">&nbsp;</i>Tambah Alat</a>
        @include('admin.kelola.tambahAlat')
    </div>
    <div class="thumbnail table-responsive">
        <table class="table table-bordered table-hover" id="kelolaAlat">
			<thead>
				<tr>
                    <th>Id Alat</th>
                    <th>Gambar</th>
                    <th>Nama Alat</th>
                    <th>Jumlah Alat</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
            @foreach($alat as $alat)
                <tr>
                    <td>{{$alat->id}}</td>
                    @if($alat->gambar != "")
                    <td>
                        <img src="{{$alat->gambar}}" class="img-responsive img-thumbnail" style="width:200px;height:200px">
                    </td>
                    @else
                    <td>
                        <img src="{{url('img/alat/not.png')}}" class="img-responsive img-thumbnail" style="width:200px;height:200px">
                    </td>
                    @endif
                    <td>{{$alat->nama}}</td>
                    <td>{{$alat->stok}}</td>
                    <td>
                        <a href="#edit{{$alat->id}}" class="btn btn-warning" data-toggle="modal"><span class="fa fa-pencil"></span></a>
                        @include('admin.kelola.edit')
                        <a href="#hapus{{$alat->id}}" class="btn btn-danger" data-toggle="modal"><span class="fa fa-trash"></span></a>
                        @include('admin.kelola.hapus')
                    </td>
                </tr>
            @endforeach
			</tbody>
			<tfoot>
				<tr>
                    <th>Id Alat</th>
                    <th>Gambar</th>
                    <th>Nama Alat</th>
                    <th>Jumlah Alat</th>
                    <th>Aksi</th>
				</tr>
			</tfoot>
		</table>
@endsection
@section('css')
<style type="text/css">
#image-preview {
  width: 200px;
  height: 200px;
  position: relative;
  overflow: hidden;
  background-color: #f0f0f0;
  color: #ecf0f1;
}
#image-preview input {
  line-height: 200px;
  font-size: 200px;
  position: absolute;
  opacity: 0;
  z-index: 10;
}
#image-preview label {
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: skyblue;
  width: 200px;
  height: 50px;
  font-size: 20px;
  line-height: 50px;
  text-transform: uppercase;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
}
</style>
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false                 // Default: false
  });
});
</script>
<script src="{{url('js/imagepreview.js')}}"></script>
<script>
    $(function () {
        $('#kelolaAlat').DataTable({
            processing 	: 	true,

        })
    });
</script>
@endsection
