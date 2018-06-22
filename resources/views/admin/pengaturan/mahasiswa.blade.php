<div class="tab-pane active" id="mhs">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="margin-bottom:10px;margin-top:10px">
            <form action="{{url('/bukanwp-admin/pengaturan/addUser')}}" enctype="multipart/form-data" method="post">
                <p><label>Tambah user dengan file CSV</label></p>
                <input type="file" name="csv" id="" class="form-control">
                {{csrf_field()}}
                <input type="submit" value="Proses" class="btn btn-primary form-control">
            </form>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <p><b>Cara Menambah Pengguna</b><br>
            Unggah sebuah file yang ber-ekstensi .csv <br>
            Terdiri dari 2 kolom yaitu
            <br>1. Kolom 1 untuk nama
            <br>2. Kolom 2 untuk username (NIM atau NIP)
            </p>
        </div>
    </div>
    <div class="thumbnail table-responsive">
        <table class="table table-hover table-bordered" id="mahasiswa">
            <thead>
                <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Reset Kata Sandi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Reset Kata Sandi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@foreach($mhs as $mhs)
@include('admin.pengaturan.mhsReset')
@endforeach
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
