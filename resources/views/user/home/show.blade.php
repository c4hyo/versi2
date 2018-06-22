<div class="modal fade" id="show{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{$alatPinjam->nama}}</h4>
            </div>
            <div class="modal-body">
                <p>Kegunaan : {{$alatPinjam->kegunaan}}</p>
                <p>Tanggal Pinjam : {{$alatPinjam->tgl_pinjam}}</p>
                <p>Tanggal Kembali : {{$alatPinjam->tgl_kembali}}</p>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                        </tr>
                   @foreach($alat3->where('tgl_pinjam',$alatPinjam->tgl_pinjam)->where('tgl_kembali',$alatPinjam->tgl_kembali) as $detailAlat)
                        <tr>
                            <td>{{$detailAlat->nama_alat}}</td>
                            <td>{{$detailAlat->jumlah}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <p><b>Keterangan</b> :<br> {{$alatPinjam->keterangan}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
