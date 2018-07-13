<div class="tab-pane" id="btl">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#alat" data-toggle="tab">Alat</a></li>
            <li><a href="#ruang" data-toggle="tab">Ruang</a></li>
            <li><a href="#post" data-toggle="tab">Posting</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane" id="post">
            <div style="margin:10px">
                <a href="{{url('/bukanwp-admin/pengaturan/posting')}}" class="btn btn-danger"><span class="fa fa-remove">&nbsp;</span>Hapus semua</a>
            </div>
            <div class="thumbnail table-responsive">
                <table class="table table-hover table-bordered" id="posting">
                    <thead>
                        <tr>
                            <th style="width:25%">Judul Posting</th>
                            <th style="width:25%">Waktu</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Judul Posting</th>
                            <th>Waktu</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="tab-pane active" id="alat">
            <div style="margin:10px">
                <a href="{{url('/bukanwp-admin/pengaturan/alat')}}" class="btn btn-danger"><span class="fa fa-remove">&nbsp;</span>Hapus semua</a>
            </div>
            <div class="thumbnail table-responsive">
                <table class="table table-hover table-bordered" id="alt">
                    <thead>
                        <tr>
                            <th style="width:25%">Nama</th>
                            <th style="width:25%">Nim</th>
                            <th style="width:25%">Alat</th>
                            <th style="width:25%">Tanggal Pinjam</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Alat</th>
                            <th>Tanggal Pinjam</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
       </div>
       <div class="tab-pane" id="ruang">
            <div style="margin:10px">
                <a href="{{url('/bukanwp-admin/pengaturan/ruang')}}" class="btn btn-danger"><span class="fa fa-remove">&nbsp;</span>Hapus semua</a>
            </div>
            <div class="thumbnail table-responsive">
                <table class="table table-hover table-bordered" id="rng">
                    <thead>
                        <tr>
                            <th style="width:25%">Nama</th>
                            <th style="width:25%">Nim</th>
                            <th style="width:25%">Kegunaan</th>
                            <th style="width:25%">Tanggal Pinjam</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Kegunaan</th>
                            <th>Tanggal Pinjam</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
       </div>
    </div>
</div>
