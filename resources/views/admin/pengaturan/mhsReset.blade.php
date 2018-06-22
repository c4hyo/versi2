<div class="modal modal-danger fade" id="reset{{$mhs->username}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reset kata sandi</h4>
            </div>
            <div class="modal-body">
                <p>Nama :   <label>{{$mhs->nama}}</label></p>
                <p>NIM  :   <label>{{$mhs->username}}</label></p>
            </div>
            <div class="modal-footer">
                <a href="{{url('/bukanwp-admin/pengaturan/'.$mhs->username.'/reset')}}" type="button" class="btn btn-default">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
