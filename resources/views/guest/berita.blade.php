@extends('layout.guest')
@section('css')

@endsection
@section('konten')
<div class="row">
@foreach($postView as $posting)
<title>{{$posting->judul}}</title>
    <div class="col-xd-12 col-sm-8 col-md-8 col-lg-8">
        <h1>
            {{$posting->judul}}
        </h1>
        <small>{{$posting->waktu}}</small>
        <p>
            {!!$posting->posting!!}
        </p>

    </div>
@endforeach

    <div class="col-sm-4 col-xd-12 col-md-4 col-lg-4">
        <ul>
            @foreach($postNot as $post)
            <li><a href="{{url('/posting/'.$post->slug)}}">{{$post->judul}}</a></li>
            @endforeach
        </ul>
    </div>

</div>
@endsection
@section('js')

@endsection
