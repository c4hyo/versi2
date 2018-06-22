@extends('layout.admin')
@section('header')
 @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
@endsection
@section('konten')
@foreach($prak as $prak)
    <title>{{$prak->nama}}</title>
    <h1><a href="{{url('/bukanwp-admin/praktikum')}}" class="btn btn-primary"><span class="fa fa-arrow-left"></span></a> Praktikum {{" ".$prak->nama}}</h1>
    <div style="margin-top:20px;margin-bottom:20px">
        @if($prak->status == "Belum")
            <div>
                <h4><label>Jadwal praktikum belum aktif. <a style="color:blue;" href="{{url('/bukanwp-admin/praktikum/'.$prak->nama.'/aktif')}}">Aktifkan sekarang</a></label></h4>
            </div>
        @else
            <div>
                <h4><label>Jadwal praktikum sudah selesai. <a style="color:red;" href="{{url('/bukanwp-admin/praktikum/'.$prak->nama.'/nonaktif')}}">Nonaktifkan sekarang</a></label></h4>
            </div>
        @endif
    </div>
    <div class="thumbnail table-responsive">
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Modul ke</th>
            <th>Judul Praktikum</th>
            <th>Tanggal Praktikum</th>
            <th>Ubah</th>
        </tr>
    </thead>
    @foreach($jadwal as $jadwal)
        <tr>
            <td>{{$jadwal->tema}}</td>
            <td>{{$jadwal->keterangan}}</td>
            <td>{{$jadwal->tgl_pinjam}}</td>
            @if($jadwal->status == "Sudah")
            <td><label class="label label-danger">Praktikum sedang berlangsung</label></td>
            @else
            <td><a href="#{{$jadwal->id}}" class="btn btn-warning" data-toggle="modal"><span class="fa fa-wrench"></span></a></td>
            @endif
            <div class="modal fade" id="{{$jadwal->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 align="center" class="modal-title">Praktikum{{" ".$prak->nama}}</h4>
                            <h4 align="center">"{{$jadwal->tema}}"</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/bukanwp-admin/praktikum/'.$jadwal->id)}}" method="post">
                                <div class="form-group">
                                    <label class="label-control">Judul Praktikum</label>
                                    <input type="text" name="judul" value="{{$jadwal->keterangan}}" class="form-control" required id="">
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Tanggal Praktikum</label>
                                    <input type="date" value="{{$jadwal->tgl_pinjam}}" name="tgl" class="form-control" required id="">
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
        </tr>
    @endforeach
    </table>
    </div>
    <div>
        <h4><label>Konten praktikum {{$prak->nama}}</label></h4>
        <form action="{{url('/bukanwp-admin/praktikum/'.$prak->nama.'/konten')}}" enctype="multipart/form-data" method="post">
            @if($prak->keterangan == "")
                <input type="file" name="gambar" class="form-control">
                <textarea id="prak" name="posting" rows="5" cols="80" required></textarea>
            @else
            <div style="margin-top:30px" class="thumbnail">
                @if($prak->gambar =="")
                <center><img src="{{url('img/alat/not.png')}}" style="width:300px;" class="img-thumbnail"></center>
            @else
                <center><img src="{{$prak->gambar}}" style="width:300px;" class="img-thumbnail"></center>
            @endif
                <p>{!!$prak->keterangan!!}</p>

            <div class="pull-right">
                <a href="#{{$prak->slug}}" data-toggle="modal" class="btn btn-warning"><span class="fa fa-cog"></span></a>
            </div>
            </div>
            @endif
            {{csrf_field()}}
        </form>
        <div class="modal fade" id="{{$prak->slug}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Praktikum {{$prak->nama}}</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" enctype="multipart/form-data" action="{{url('/bukanwp-admin/praktikum/'.$prak->nama.'/konten')}}" method="post">
                            <div>
                            @if($prak->gambar == null)
                                <input type="file" name="gambar" class="form-control" value="">
                            @else

                            @endif
                            </div>
                            <textarea id="prak" name="posting" rows="5" cols="80" required>{!!$prak->keterangan!!}</textarea>
                            {{csrf_field()}}
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary form-control" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('js')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('prak');
</script>
@endsection
