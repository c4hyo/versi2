<div class="active tab-pane" id="meja">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="table-responsive thumbnail">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Meja</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($meja as $meja)
                            <tr>
                                <td>{{$meja->id}}</td>
                                @if($meja->status == "Belum")
                                <td>{{"---"}}</td>
                                <td>{{"---"}}</td>
                                <td><label class="label label-danger">{{$meja->status}}</label></td>
                                <td></td>
                                @elseif($meja->status == "Proses")
                                <td>{{$meja->nama}}</td>
                                <td>{{$meja->username}}</td>
                                <td><label class="label label-warning">{{$meja->status}}</label></td>
                                <td>
                                    <div>
                                        <a href="{{url('/bukanwp-admin/peminjaman/meja/setuju/'.$meja->id)}}" class="btn btn-success"><span class="fa fa-check"></span></a>
                                        <a href="#{{$meja->id}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                    </div>
                                </td>
                                @else
                                <td>{{$meja->nama}}</td>
                                <td>{{$meja->username}}</td>
                                <td><label class="label label-success">{{$meja->status}}</label></td>
                                <td>
                                    <div>
                                        <a href="#{{$meja->id}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                    </div>
                                </td>
                                @endif
                            </tr>
                             <div class="modal modal-danger fade" id="{{$meja->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Peminjaman meja dibatalkan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Nama :   <label>{{$meja->nama}}</label></p>
                                            <p>NIM  :   <label>{{$meja->username}}</label></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{url('/bukanwp-admin/peminjaman/meja/batal/'.$meja->id)}}" type="button" class="btn btn-default">Ya</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
