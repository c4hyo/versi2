@extends('layout.guest')
@section('konten')
    <title>RES Lab</title>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <center><img src="{{url('img/praktikum/nx-4i_02.jpg')}}" alt="sisdig" class="img-thumbnail"  style="width:500px;height:400px"></center>
        <div class="carousel-caption">
          <h3 style="color:#0e0e0e;background-color:#f0f0f0">Praktikum</h3>
          <h4 style="color:#0e0e0e;background-color:#f0f0f0">Sistem Digital</h4>
        </div>
      </div>

      <div class="item">
        <center><img src="{{url('img/praktikum/tip.jpg')}}" alt="TIP" class="img-thumbnail"  style="width:500px;height:400px"></center>
        <div class="carousel-caption">
          <h3 style="color:#0e0e0e;background-color:#f0f0f0">Praktikum</h3>
          <h4 style="color:#0e0e0e;background-color:#f0f0f0">Teknik Interface dan Peripheral</h4>
        </div>
      </div>

      <div class="item">
        <center><img src="{{url('img/praktikum/1331-2755.jpg')}}" alt="TM" class="img-thumbnail"  style="width:500px;height:400px"></center>
        <div class="carousel-caption">
          <h3 style="color:#0e0e0e;background-color:#f0f0f0">Praktikum</h3>
          <h4 style="color:#0e0e0e;background-color:#f0f0f0">Teknik Mikroprosesor</h4>
        </div>
      </div>
      <div class="item">
        <center><img src="{{url('img/praktikum/515b4656ce395f8a38000000.png')}}" alt="Robotik" class="img-thumbnail" style="width:500px;height:400px"></center>
        <div class="carousel-caption">
          <h3 style="color:#0e0e0e;background-color:#f0f0f0">Praktikum</h3>
          <h4 style="color:#0e0e0e;background-color:#f0f0f0">Robotika</h4>
        </div>
      </div>
        <div class="item">
        <center><img src="{{url('img/praktikum/Spartan-3E.jpg')}}" alt="SDL" class="img-thumbnail"  style="width:500px;height:400px"></center>
        <div class="carousel-caption">
          <h3 style="color:#0e0e0e;background-color:#f0f0f0">Praktikum</h3>
          <h4 style="color:#0e0e0e;background-color:#f0f0f0">Sistem Digital Lanjut</h4>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<div class="row" style="margin-top:40px">
  <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1"></div>
    @foreach($praktikum as $prak)
  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
    <div style="padding-bottom:20px">
        <img src="{{$prak->gambar}}" alt="New York" style="width:300px;height:150px" class="img-circle img-thumbnail">
    </div>
    <div class="thumbnail">
        <label><p><a href="{{url('/praktikum/'.$prak->slug)}}">{{$prak->nama}}</a></p></label>
        <p>{!!$prak->keterangan!!}</p>
    </div>
    <div class="thumbnail">
        @if($prak->status == "Sudah")
            <p><a href="{{url('/kegiatan')}}">Lihat Jadwal</a></p>
        @else
            <p><u>Praktikum Belum dimulai</u></p>
        @endif
    </div>
  </div>
    @endforeach
  <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1"></div>
</div>
<h1>Posting Kegiatan</h1>
<div>
    <ul class="timeline">
        @if(count($posting) == 0)
            <h3>Belum ada Posting Kegiatan</h3>
        @else
        @foreach($posting as $post)
        <li class="time-label">
            <span class="bg-orange">
               {{$post->waktu}}
            </span>
        </li>
        <li>
            <i class="fa fa-pencil bg-blue"></i>
            <div class="timeline-item">
                <h3 class="timeline-header"><a href="{{url('/posting/'.$post->slug)}}">{{$post->judul}}</a></h3>
                <div class="timeline-body">
                  {!!$post->posting!!}
                </div>
              </div>
        </li>
        @endforeach
        @endif
    </ul>
</div>
@endsection
@section('navbar')
<li class=""><a href="{{url('/kegiatan')}}">Kegiatan</a></li>
<li class=""><a href="{{url('/alat')}}">Daftar Alat Lab</a></li>
<li class=""><a href="{{url('/langkah-peminjaman')}}">Langkah Peminjaman</a></li>
@endsection

