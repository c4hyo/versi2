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
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="{{url('img/la.jpg')}}" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="{{url('img/chicago.jpg')}}" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>

      <div class="item">
        <img src="{{url('img/ny.jpg')}}" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3><a href="">New York</a></h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>

      <div class="item">
        <img src="{{url('img/ny.jpg')}}" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
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
        <label><p>{{$prak->nama}}</p></label>
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

