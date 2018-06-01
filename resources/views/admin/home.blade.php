@extends('layout.admin')
@php
date_default_timezone_set('Asia/Jakarta');
switch (date("l")) {
	case 'Wednesday':
		$hari = "RABU ";
		break;
	case 'Monday':
		$hari = "SENIN ";
		break;
	case 'Tuesday':
		$hari = "SELASA ";
		break;
	case 'Thursday':
		$hari = "KAMIS ";
		break;
	case 'Friday':
		$hari = "JUMAT ";
		break;
	case 'Saturday':
		$hari = "SABTU ";
		break;
	case 'Sunday':
		$hari = "MINGGU ";
		break;
	default:
		$hari = date("l");
		break;
}
@endphp
@section('header')
<title>Admin | Home</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div style="background:#0d47a1;color:#e0e0e0;" class="small-box">
            <div class="inner">
                <h3>{{$hari}}</h3>
                <p>{{date('d-m-Y')}}</p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar-o"></i>
            </div>
            <span class=" small-box-footer" id="txt"></span>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div style="background:#00695c ;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$meja}}</h3>
              <p>Meja Tersedia</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div style="background:#9e9d24;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$alat}}</h3>
              <p>Alat Tersedia</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div style="background:#ef6c00 ;color:#e0e0e0;" class="small-box">
            <div class="inner">
              <h3>{{$posting}}</h3>
              <p>Banyak Posting</p>
            </div>
            <div class="icon">
              <i class="fa fa-pencil"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>
    <div style="margin-top:15px;margin-bottom:20px;"></div>
    <div class="row">
        <div class="col-sm-8 col-md-8 col-xs-12">
            <div class="thumbnail" id="calendar"></div>
        </div>
        <div class="thumbnail col-sm-4 col-md-4 col-xs-12" style="height:590px;overflow-y:scroll">
        @php
            for($i=0;$i<100;$i++){
        @endphp
        <li class="list-group-item list-group-item-success">First item</li>
        @php
            }
        @endphp
        </div>
    </div>
</div>
@endsection
@section('css')
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
@endsection
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
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2018-05-01'
        }
      ]
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
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
@endsection
