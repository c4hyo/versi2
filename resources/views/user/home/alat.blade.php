<div class="modal fade" id="alat{{$alatPinjam->tgl_pinjam}}{{$alatPinjam->tgl_kembali}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cetak Surat Alat <br><small>{{$alatPinjam->kegunaan}}</small></h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/user/surat/alat/'.$alatPinjam->tgl_pinjam.'/'.$alatPinjam->tgl_kembali)}}" method="post">
                    <div><label for=""><h3>{{$alatPinjam->nama}}</h3></label></div>
                    <div class="form-group">
                        <label class="label-control">Dosen Pembimbing 1</label>
                        <input type="text" name="dosbing1" class="form-control" required title="Di isi ( - ) kalo tidak ada Dosen Pembimbing">
                    </div>
                    <div class="form-group">
                        <label class="label-control">Dosen Pembimbing 2</label>
                        <input type="text" name="dosbing2" class="form-control" required title="Di isi ( - ) kalo tidak ada Dosen Pembimbing">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Judul</label>
                        <textarea name="judul" id="" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                {{csrf_field()}}
            </div>
            <div class="modal-footer">
                    <input type="submit" class="form-control btn btn-primary" value="Cetak">
                </form>
            </div>
        </div>
    </div>
</div>
