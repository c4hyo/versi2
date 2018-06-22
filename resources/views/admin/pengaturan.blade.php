@extends('layout.admin')
@section('header')
<title>Admin | Pengaturan</title>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
@endsection
@section('konten')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#mhs" data-toggle="tab">Pengguna</a></li>
            <li><a href="#btl" data-toggle="tab">Pembatalan peminjaman</a></li>
            <li><a href="#lain" data-toggle="tab">Lain-lain</a></li>
            <li><a href="#admin" data-toggle="tab">Admin</a></li>
        </ul>
    </div>
    <div class="tab-content">
        @include('admin.pengaturan.mahasiswa')
        @include('admin.pengaturan.batal')
        @include('admin.pengaturan.lain')
        @include('admin.pengaturan.admin')
    </div>
@endsection

@section('js')
<!-- <script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> -->
<script>
  $(function () {
    $('#mahasiswa').DataTable({
    	processing 	: 	true,
    	serverSide	: 	true,
        searchable  :   true,
    	ajax		: 	"{{route('user')}}",
    	columns		: 	[
    		{data:'username',name:'username'},
    		{data:'nama',name:'nama'},
            {data:'username',"render": function(data,type,row,meta) {
                // return '<a href="'+data+'">Download</a>';
                return '&nbsp;&nbsp;&nbsp;<a href="#reset'+data+'" data-toggle="modal" class="btn btn-warning"><span class="fa fa-refresh"></span></a>';
             } }
    	]
    })
});
</script>
<script>
  $(function () {
    $('#rng').DataTable({
    	processing 	: 	true,
    	serverSide	: 	true,
    	ajax		: 	"{{route('ruang')}}",
    	columns		: 	[
    		{data:'nama',name:'nama'},
    		{data:'username',name:'username'},
            {data:'kegunaan',name:'kegunaan'},
    		{data:'tgl_pinjam',name:'tgl_pinjam'},
    	]
    })
});
</script>
<script>
  $(function () {
    $('#alt').DataTable({
    	processing 	: 	true,
    	serverSide	: 	true,
    	ajax		: 	"{{route('alat')}}",
    	columns		: 	[
    		{data:'nama',name:'nama'},
    		{data:'username',name:'username'},
            {data:'nama_alat',name:'nama_alat'},
            {data:'tgl_pinjam',name:'tgl_pinjam'}
    	]
    })
});
</script>
@endsection

