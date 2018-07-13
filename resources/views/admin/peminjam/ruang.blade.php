    <div class="tab-pane" id="ruang">
        <div class="thumbnail table-responsive">
            <table class="table table-bordered table-hover" id="pinjamRuang">
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Nim Peminjam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($Ruang as $ruang)
                @if($ruang->status == "Belum")
                    <tr>
                        <td>{{$ruang->nama}}</td>
                        <td>{{$ruang->username}}</td>
                        <td><label class="label label-danger">{{$ruang->status}}&nbsp;disetujui</label></td>
                        <td>
                            <a href="#show{{$ruang->username}}{{$ruang->tgl_pinjam}}" data-toggle="modal" class="btn btn-default" ><span class="fa fa-search"></span></a>
                            @include('admin.peminjam.ruang.show')
                            <a href="#batal{{$ruang->username}}{{$ruang->tgl_pinjam}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                            @include('admin.peminjam.ruang.batal')
                            @if($ruang->ktm == null)

                            @else
                            <a href="#setuju{{$ruang->username}}{{$ruang->tgl_pinjam}}" data-toggle="modal" class="btn btn-success"><span class="fa fa-check"></span></a>
                            @include('admin.peminjam.ruang.setuju')
                            <a href="{{$ruang->ktm}}" class="btn btn-info"><span class="fa fa-user"></span></a>
                            @endif

                        </td>
                    </tr>
                @elseif($ruang->status == "Sudah")
                    <tr>
                        <td>{{$ruang->nama}}</td>
                        <td>{{$ruang->username}}</td>
                        <td><label class="label label-success">{{$ruang->status}}&nbsp;disetujui</label></td>
                        <td>
                            <a href="#show{{$ruang->username}}{{$ruang->tgl_pinjam}}" data-toggle="modal" class="btn btn-default" ><span class="fa fa-search"></span></a>
                            @include('admin.peminjam.ruang.show')
                        </td>
                    </tr>
                @endif
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Nim Peminjam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
