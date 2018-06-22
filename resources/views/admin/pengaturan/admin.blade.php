<div class="tab-pane" id="admin">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-4">
        <label>Ubah profil</label>
            @foreach($admin->where('nama',$nama) as $admin)
                <form action="{{url('/bukanwp-admin/pengaturan/admin/'.$admin->user.'/profil')}}" method="post">
                <div class="form-group">
                    <label for="" class="label-control">Nama</label>
                    <input type="text" name="nama" id="" required class="form-control" value="{{$admin->nama}}">
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Username</label>
                    <input type="text" name="user" id="" required class="form-control" value="{{$admin->user}}">
                </div>
                {{csrf_field()}}
                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
                </form>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-4">
            <label for="">Ubah Kata Sandi</label>
            <form action="{{url('/bukanwp-admin/pengaturan/admin/'.$admin->user.'/pass')}}" method="post">
                <div class="form-group">
                    <label for="" class="label-control">Kata Sandi</label>
                    <input type="password" name="pass" id="" required class="form-control" placeholder="Masukan Kata Sandi Baru">
                </div>
                {{csrf_field()}}
                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form>
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-3">

        </div>
    </div>
</div>
