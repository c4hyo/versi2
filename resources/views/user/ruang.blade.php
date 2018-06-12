@extends('layout.user')
@section('css')
<link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
@endsection
@section('konten')
	<title>Ruang | {{$nama}}</title>
    @if(session('sukses'))
      <div class="alert alert-success">
          <p align="center">{{ session('sukses') }}</p>
      </div>
    @elseif(session('gagal'))
      <div class="alert alert-danger">
          <p align="center">{{ session('gagal') }}</p>
      </div>
    @endif
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			<div class="thumbnail" id="calendar"></div>
		</div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <h3>
            Form Peminjaman Ruang
        </h3>
            @foreach($user as $user)
            <form action="{{url('/user/ruang')}}" method="post" class="form-group">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{$nama}}" placeholder="Hallo" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" value="{{$nim}}" placeholder="Hallo" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="4">{{$user->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="no_hp" value="{{$user->no_hp}}" placeholder="Nomor Telepon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Pinjam</label>
                    <input type="date" name="pinjam" value="" placeholder="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Kegunaan</label>
                    <select name="kegunaan" id="" required class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="Seminar Kerja Praktik">Seminar Kerja Praktik</option>
                        <option value="Seminar Tugas Akhir">Seminar Tugas Akhir</option>
                        <option value="Penelitian">Penelitian</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {{csrf_field()}}
                    <input type="submit" value="Simpan" class="form-control btn btn-info">
                </div>
            </form>
            @endforeach
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
@section('nama')
	{{$nama}}
@endsection
