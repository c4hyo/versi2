@extends('layout.guest')
{{-- untuk menambahkan css --}}
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
{{-- menambahkan konten atau isi dari web --}}
@section('konten')
<title>RES Lab | Daftar Alat</title>
	<div class="thumbnail table-responsive">
		<table class="table table-bordered table-hover" id="alat">
			<thead>
				<tr>
					<th>Id</th>
					<th>Gambar</th>
					<th>Nama Alat</th>
					<th>Jumlah Alat</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Gambar</th>
					<th>Nama Alat</th>
					<th>Jumlah Alat</th>
					<th>Keterangan</th>
				</tr>
			</tfoot>
		</table>
	</div>
@endsection
{{-- menambahkan javascript --}}
@section('js')
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#alat').DataTable({
    	processing 	: 	true,
    	serverSide	: 	true,
    	ajax		: 	"{{route('lihatAlat')}}",
    	columns		: 	[
    		{data:'id',name:'id'},
    		{data:'gambar',name:'gambar'},
    		{data:'nama',name:'nama'},
    		{data:'stok',name:'stok'},
    		{data:'keterangan',name:'keterangan'},
    	]
    })
});
</script>
@endsection