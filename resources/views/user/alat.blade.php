@extends('layout.user')
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('konten')
	<title>Alat | {{$nama}}</title>

@section('nama')
	{{$nama}}
@endsection
<div class="thumbnail table-responsive">
		<table class="table table-bordered table-hover" id="example1">
			<thead>
				<tr>
					<th>No</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
				</tr>
			</tfoot>
		</table>
	</div>
@endsection
@section('js')
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
    	
    })
});
</script>
@endsection
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span>Peminjaman Alat</span></h1>
@endsection