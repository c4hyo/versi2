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
                                @if($meja->username == null)
                                <td>{{"---"}}</td>
                                <td>{{"---"}}</td>
                                <td><label class="label label-warning">{{$meja->status}}</label></td>
                                <td></td>
                                @else
                                <td>{{$meja->nama}}</td>
                                <td>{{$meja->username}}</td>
                                <td></td>
                                <td>
                                    <div><a href=""></a></div>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
