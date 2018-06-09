@extends('layout.admin')
@section('header')
<title>Admin | Pengelolaan</title>
<h1>Pengelolaan Alat Laboratorium</h1>
@endsection
@section('konten')
    <div class="container-fluid" style="margin-bottom:30px;">
        <center>
            <form action="">
                <a href="" class="btn btn-primary pull-right"><i class="fa fa-plus">&nbsp;</i>Tambah Alat</a>
            </form>
        </center>
    </div>
    <div class="thumbnail table-responsive">
        <table class="table table-bordered table-hover" id="kelolaAlat">
			<thead>
				<tr>
                    <th>Id Alat</th>
                    <th>Nama Alat</th>
                    <th>Jumlah Alat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
                    <th>Id Alat</th>
                    <th>Nama Alat</th>
                    <th>Jumlah Alat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
				</tr>
			</tfoot>
		</table>
    </div>
@endsection
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js')
<script>
    $(function () {
        $('#kelolaAlat').DataTable({
            processing 	: 	true,

        })
    });
</script>
@endsection
