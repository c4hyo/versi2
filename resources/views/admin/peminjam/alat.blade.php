<div class="tab-pane" id="alat">
     <div class="thumbnail table-responsive">
		<table class="table table-bordered table-hover" id="pinjamAlat">
			<thead>
				<tr>
                    <th>Nama Peminjam</th>
                    <th>Nim Peminjam</th>
                    <th>Status</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
            @foreach($viewAlat as $alat)
            @if($alat->status == "Belum")
                <tr>
                    <td>{{$alat->nama}}</td>
                    <td>{{$alat->username}}</td>
                    <td><label class="label label-danger">{{$alat->status}}</label></td>
                    <td>
                        <div>
                            <a href="#show{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-default" data-toggle="modal"><span class="fa fa-search"></span></a>
                            @include('admin.peminjam.alat.show')
                            <a href="#setuju{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-success" data-toggle="modal"><span class="fa fa-check"></span></a>
                            @include('admin.peminjam.alat.setuju')
                            <a href="#batal{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-danger" data-toggle="modal"><span class="fa fa-remove"></span></a>
                            @include('admin.peminjam.alat.batal')
                        </div>
                    </td>
                </tr>
                @elseif($alat->status == "Sudah")
                <tr>
                    <td>{{$alat->nama}}</td>
                    <td>{{$alat->username}}</td>
                    <td><label class="label label-primary">{{$alat->status}}</label></td>
                    <td>
                        <div>
                            <a href="#show{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-default" data-toggle="modal"><span class="fa fa-search"></span></a>
                            @include('admin.peminjam.alat.show')
                        </div>
                    </td>
                </tr>
                @elseif($alat->status == "P Kembali")
                <tr>
                    <td>{{$alat->nama}}</td>
                    <td>{{$alat->username}}</td>
                    <td><label class="label label-warning">Proses Kembali</label></td>
                    <td>
                        <div>
                            <a href="#show{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-default" data-toggle="modal"><span class="fa fa-search"></span></a>
                            @include('admin.peminjam.alat.show')
                            <a href="#terima{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-warning" data-toggle="modal"><span class="fa fa-thumbs-o-up"></span></a>
                            @include('admin.peminjam.alat.terima')
                        </div>
                    </td>
                </tr>
                @elseif($alat->status == "Terima")
                <tr>
                    <td>{{$alat->nama}}</td>
                    <td>{{$alat->username}}</td>
                    <td><label class="label label-success">Alat sudah diterima</label></td>
                    <td>
                        <div>
                            <a href="#show{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}" class="btn btn-success" data-toggle="modal"><span class="fa fa-search"></span></a>
                            @include('admin.peminjam.alat.show')
                        </div>
                    </td>
                </tr>
                @endif
            @endforeach
			</tbody>
			<tfoot>
				<tr>
                    <th>Nama Peminjam</th>
                    <th>Nim Peminjam</th>
                    <th>Status</th>
                    <th>Aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
