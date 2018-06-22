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
    		{data:'gambar',"render": function(data,type,row,meta) {
                if(data == null){
                     return '<img src="{{url("img/alat/not.png")}}" style="width:200px" class="img-rounded img-responsive">';
                }else{
                    return '<img src="'+data+'" style="width:200px" class="img-rounded img-responsive">';
                }

            }},
    		{data:'nama',name:'nama'},
    		{data:'stok',name:'stok'},
    		{data:'keterangan',name:'keterangan'},
    	]
    })
});
</script>
@endsection
