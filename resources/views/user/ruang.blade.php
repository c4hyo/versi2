@extends('layout.user')
@section('css')
<link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
@endsection
@section('konten')
	<title>User | Ruang</title>

	<div class="row">
		<div class="col-xs-offset-0 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-10 col-md-8 col-lg-8">
			<div class="thumbnail" id="calendar"></div>
		</div>
	</div>
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

</script>
@endsection
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span>Peminjaman Ruang</span></h1>
@endsection