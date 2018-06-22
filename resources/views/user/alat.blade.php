@extends('layout.user')
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('konten')
	<title>Alat | {{$nama}}</title>

@section('nama')
	{{$nama}}
@endsection


<div style="margin-bottom:30px">
@if(count($pinjamAlat)!=0)
    <a href="{{url('/user/alat/cart')}}" class="btn btn-primary"><i class="fa fa-shopping-cart">&nbsp;</i>Keranjang Alat</a>
@else
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
</div>

<div class="thumbnail table-responsive">
		<table class="table table-bordered table-hover" id="alatUser">
			<thead>
				<tr>
					<th>No</th>
                    <th>Gambar</th>
                    <th>Detail Alat</th>
                    <th>Jumlah Pinjam</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
                @php
                $no = 1;
                @endphp
                @foreach($alat as $alat)
                <tr>
                    <td>{{$no++}}</td>
                    @if($alat->gambar == null)
                    <td><img src="{{url('img/alat/not.png')}}" class="img-responsive img-thumbnail img-rounded" style="width:70%"></td>
                    @else
                    <td><img src="{{$alat->gambar}}" class="img-responsive img-thumbnail img-rounded" style="width:70%"></td>
                    @endif
                    <td>
                        <div>
                            <label for="">Nama Alat : </label>
                            <p>
                                {{$alat->nama}}
                            </p>
                        </div>
                        <div>
                            <label for="">Jumlah Alat : </label>
                            <p>
                                @if($alat->stok == 0)
                                    {{"Alat Habis"}}
                                @else
                                    {{$alat->stok." ".$alat->satuan}}
                                @endif
                            </p>
                        </div>
                        <div>
                            <label for="">Keterangan : </label>
                            <p>
                                @if($alat->keterangan == "")
                                    {{"---"}}
                                @else
                                    {{$alat->keterangan}}
                                @endif
                            </p>
                        </div>
                    </td>
                    <form action="{{url('/user/alat/cart/'.$alat->id)}}" method="post" >
                    {{csrf_field()}}
                    <td>
                    <div class="form-group">
                        <input type="number" name="Jumlah" id="" class="form-control" min="0" max="{{$alat->stok}}" required>
                    </div>
                    </td>
                    <td><button class="btn btn-info btn-sm" type="submit"><span class="fa fa-thumbs-o-up">&nbsp;</span>Pilih</button></td>
                    </form>
                </tr>
                @endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
                    <th>Gambar</th>
                    <th>Detail Alat</th>
                    <th>Jumlah Pinjam</th>
                    <th>Aksi</th>
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
    $('#alatUser').DataTable({ })
});
</script>
@endsection
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span>Peminjaman Alat</span></h1>
@endsection
