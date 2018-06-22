<div class="modal fade" id="show{{$alat->username}}{{$alat->tgl_pinjam}}{{$alat->tgl_kembali}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{$alat->nama}}</h4>
            </div>
            <div class="modal-body">
                <p>Kegunaan : {{$alat->kegunaan}}</p>
                <p>Tanggal Pinjam : {{$alat->tgl_pinjam}}</p>
                <p>Tanggal Kembali : {{$alat->tgl_kembali}}</p>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                        </tr>
                   @foreach($alat1->where('username',$alat->username)->where('tgl_pinjam',$alat->tgl_pinjam)->where('tgl_kembali',$alat->tgl_kembali) as $detailAlat)
                        <tr>
                            <td>{{$detailAlat->nama_alat}}</td>
                            <td>{{$detailAlat->jumlah}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <p><b>Keterangan</b> :<br> {{$alat->keterangan}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
