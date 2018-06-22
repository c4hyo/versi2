@extends('layout.admin')
@section('header')
<title>Admin | Posting</title>

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
    <div class="col-xs-12 col-sm-12 col-lg-7 col-md-7">
        <h2>Buat Posting</h2>
        <form class="form-group" action="{{url('/bukanwp-admin/posting')}}" method="post">
            <div>
                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
            </div>
            <textarea id="editor1" name="posting" rows="5" cols="80" required></textarea>
            {{csrf_field()}}
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <h2>Daftar Posting</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="posting">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posting as $posting)
                @if($posting->status == "Belum")
                    <tr>
                        <td>{{$posting->judul}}</td>
                        <td>
                            <a href="{{url('/bukanwp-admin/posting/show/'.$posting->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="#edit{{$posting->id}}" class="btn btn-warning" data-toggle="modal"><span class="fa fa-pencil"></span></a>
                            @include('admin.posting.show')
                            <a href="{{url('/bukanwp-admin/posting/hapus/'.$posting->id)}}" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @elseif($posting->status == "Sudah")
                    <tr>
                        <td>{{$posting->judul}}</td>
                        <td>
                            <a href="{{url('/bukanwp-admin/posting/tidak/'.$posting->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-close"></span></a>
                            <a href="{{url('/bukanwp-admin/posting/hapus/'.$posting->id)}}" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                        </td>
                    </tr>
                @endif
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
@section('css')

@endsection
@section('js')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('edit');
</script>
<script>
     $(function () {
        $('#posting').DataTable({
            processing 	: 	true,

        })
    });
</script>
@endsection
