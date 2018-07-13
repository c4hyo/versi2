<div class="modal fade" id="edit{{$alat->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah alat tersebut akan diubah </h4>
            </div>
            <div class="modal-body">
               <form action="{{url('/bukanwp-admin/pengelolaan/alat/edit/'.$alat->id)}}" enctype="multipart/form-data" method="post">
                <p><label>Gambar</label></p>
                <center>
                    @if($alat->gambar != "")
                        <img src="{{$alat->gambar}}" class="img-responsive img-thumbnail" style="width:200px;height:200px">
                    @else
                        <div id="image-preview" class="form-group">
                            <label class="label-control">Gambar</label>
                            <label for="image-upload" id="image-label">Pilih Gambar</label>
                            <input type="file" name="gambar" id="image-upload" />
                        </div>
                    @endif
                </center>
                    <div class="form-group">
                        <label class="label-control">Nama Alat</label><br>
                        <input type="text" name="nama" class="form-control" value="{{$alat->nama}}" id=""><br>
                    </div>
                     <div class="form-group">
                        <label class="label-control">Stok Alat</label><br>
                        <input type="number" name="stok" class="form-control" value="{{$alat->stok}}" id=""><br>
                    </div>
                     <div class="form-group">
                        <label class="label-control">Satuan</label><br>
                        <input type="text" name="satuan" class="form-control" value="{{$alat->satuan}}" id=""><br>
                    </div>
                     <div class="form-group">
                        <label class="label-control">Merk Alat</label><br>
                        <input type="text" name="merk" class="form-control" value="{{$alat->merk}}" id=""><br>
                    </div>
                     <div class="form-group">
                        <label class="label-control">Keterangan</label><br>
                        <input type="text" name="ket" class="form-control" value="{{$alat->keterangan}}" id=""><br>
                    </div>
                {{csrf_field()}}
            </div>
            <div class="modal-footer">
                  <input type="submit" class="form-control btn btn-primary" value="Ubah">
                </form>
            </div>
        </div>
    </div>
</div>
