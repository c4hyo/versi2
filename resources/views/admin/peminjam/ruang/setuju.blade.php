<div class="modal modal-success fade" id="setuju{{$ruang->username}}{{$ruang->tgl_pinjam}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Peminjaman ruang disetujui</h4>
            </div>
            <div class="modal-body">
                <p>Nama  : {{$ruang->nama}}</p>
                <p>Nim  : {{$ruang->username}}</p>
            </div>
            <div class="modal-footer">
                <a href="{{url('/bukanwp-admin/peminjaman/ruang/setuju/'.$ruang->username.'/'.$ruang->tgl_pinjam.'/'.$ruang->kegunaan)}}" class="btn btn-default">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
