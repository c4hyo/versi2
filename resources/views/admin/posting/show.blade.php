<div class="modal fade" id="edit{{$posting->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah postingan</h4>
            </div>
            <div class="modal-body">
                <form class="form-group" action="{{url('/bukanwp-admin/posting/ubah/'.$posting->id)}}" method="post">
                    <div>
                        <input type="text" name="judul" class="form-control" value="{{$posting->judul}}" required>
                    </div>
                    <textarea id="edit" name="posting" rows="5" cols="80" required>{!!$posting->posting!!}</textarea>
                    {{csrf_field()}}

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary form-control" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>
