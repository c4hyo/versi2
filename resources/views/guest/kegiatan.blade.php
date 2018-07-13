@extends('layout.guest')
{{-- untuk menambahkan css --}}
@section('css')
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
@endsection
{{-- menambahkan konten atau isi dari web --}}
@section('konten')
	<title>RES Lab | Kegiatan</title>
	<div class="row">
		<div class="col-xs-offset-0 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-10 col-md-8 col-lg-8">
			<div class="thumbnail" id="calendar"></div>
		</div>
	</div>
@endsection
{{-- menambahkan javascript --}}
@section('js')
<script src="{{url('bower_components/moment/moment.js')}}"></script>
<script src="{{url('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{url('bower_components/fullcalendar/dist/locale-all.js')}}"></script>
<script>
	 $(document).ready(function() {
    var initialLocaleCode = 'id';

    $('#calendar').fullCalendar({
      header: {
        right: 'prev,next today',
        center: 'title',
        left: 'month,listWeek,listDay'
      },
      defaultDate: '{{date('Y-m-d')}}',
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true,
      events: [
        @foreach($praktikum as $prak)
        {
            title:  '{{$prak->kegunaan.'\n'.$prak->tema}}',
            start:  '{{$prak->tgl_pinjam}}',
            color:  '#00695c '
        },
        @endforeach
        @foreach($peminjaman as $peminjaman)
        {
            title:  '{{$peminjaman->nama.'\n'.$peminjaman->kegunaan}}',
            start:  '{{$peminjaman->tgl_pinjam}}',
            color:  '#01579b'
        },
        @endforeach
      ],
    });

    // build the locale selector's options
    $.each($.fullCalendar.locales, function(localeCode) {
      $('#locale-selector').append(
        $('<option/>')
          .attr('value', localeCode)
          .prop('selected', localeCode == initialLocaleCode)
          .text(localeCode)
      );
    });

    // when the selected option changes, dynamically change the calendar option
    $('#locale-selector').on('change', function() {
      if (this.value) {
        $('#calendar').fullCalendar('option', 'locale', this.value);
      }
    });
  });

</script>
@endsection
@section('navbar')
<li class="active"><a href="{{url('/kegiatan')}}">Kegiatan</a></li>
<li class=""><a href="{{url('/alat')}}">Daftar Alat Lab</a></li>
<li class=""><a href="{{url('/langkah-peminjaman')}}">Langkah Peminjaman</a></li>
@endsection
