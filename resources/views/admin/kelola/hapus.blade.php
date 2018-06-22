<div class="modal modal-danger fade" id="hapus{{$alat->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah alat tersebut akan dihapus </h4>
            </div>
            <div class="modal-body">
                Nama Alat : {{$alat->nama}}
            </div>
            <div class="modal-footer">
                <a href="{{url('/bukanwp-admin/pengelolaan/alat/hapus/'.$alat->id)}}" type="button" class="btn btn-default">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
