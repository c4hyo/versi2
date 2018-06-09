@extends('layout.admin')
@section('header')
<title>Admin | Posting</title>

@endsection
@section('konten')
<div class="row">
    <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7">
        <h2>Buat Posting</h2>
        <form class="form-group" action="/admin/posting" method="post">
            <div>
                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
            </div>
            <textarea id="editor1" name="posting" rows="5" cols="80" required>

            </textarea>
            {{csrf_field()}}
        </form>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
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
</script>
<script>
     $(function () {
        $('#posting').DataTable({
            processing 	: 	true,

        })
    });
</script>
@endsection
