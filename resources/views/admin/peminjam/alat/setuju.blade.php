<div class="modal modal-success fade" id="setuju{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Peminjaman alat disetujui</h4>
            </div>
            <div class="modal-body">
                <p>Nama :   <label>{{$alat->nama}}</label></p>
                <p>NIM  :   <label>{{$alat->username}}</label></p>
            </div>
            <div class="modal-footer">
                <a href="{{url('/bukanwp-admin/peminjaman/alat/setuju/'.$alat->username.'/'.$alat->tgl_pinjam.'/'.$alat->tgl_kembali)}}" type="button" class="btn btn-default">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
