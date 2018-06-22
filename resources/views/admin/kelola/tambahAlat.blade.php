<div class="modal fade" id="AddAlat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Alat</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('/bukanwp-admin/pengelolaan/alat/')}}" enctype="multipart/form-data" method="post">
                <p><label>Gambar</label></p>
                <center>
                    <div id="image-preview" class="form-group">
                        <label class="label-control">Gambar</label>
                        <label for="image-upload" id="image-label">Pilih Gambar</label>
                        <input type="file" name="gambar" id="image-upload" />
                    </div>
                </center>
                    <div class="form-group">
                        <label class="label-control">Nama Alat</label>
                        <input type="text" name="nama" class="form-control" required id="">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Stok Alat</label>
                        <input type="number" name="stok" class="form-control" required id="">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Satuan</label>
                        <input type="text" name="satuan" class="form-control"  id="">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Merk Alat</label>
                        <input type="text" name="merk" class="form-control"  id="">
                    </div>
                     <div class="form-group">
                        <label class="label-control">Keterangan</label>
                        <input type="text" name="ket" class="form-control"  id="">
                    </div>
                {{csrf_field()}}
            </div>
            <div class="modal-footer">
                    <input type="submit" class="form-control btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>
