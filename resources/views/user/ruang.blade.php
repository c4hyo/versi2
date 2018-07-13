@extends('layout.user')
@section('css')
<link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
 <link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
@endsection
@section('konten')
	<title>Ruang | {{$nama}}</title>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
            <h2>Keterangan : </h2>
            <table>
                <tr>
                    <td style="width:50%"><div style="background-color:#00695c"><h3 style="color:#00695c">__________</h3></div></td>
                    <td style="width:50%"><h4>&nbsp;Digunakan praktikum</h4></td>
                </tr>
                <tr>
                    <td style="width:50%"><div style="background-color:#01579b"><h3 style="color:#01579b">__________</h3></div></td>
                    <td style="width:50%"><h4>&nbsp;Sudah disetujui</h4></td>
                </tr>
                <tr>
                    <td style="width:50%"><div style="background-color:#ff9100"><h3 style="color:#ff9100">__________</h3></div></td>
                    <td style="width:50%"><h4>&nbsp;Belum disetujui</h4></td>
                </tr>
                <tr>
                    <td style="width:50%"><div style="background-color:#b71c1c"><h3 style="color:#b71c1c">__________</h3></div></td>
                    <td style="width:50%"><h4>&nbsp;Peminjaman dibatalkan</h4></td>
                </tr>
            </table>
		</div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <h3>
            Form Peminjaman Ruang
        </h3>
            @foreach($user as $user)
            <form action="{{url('/user/ruang')}}" method="post" class="form-group">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{$nama}}" placeholder="Hallo" class="form-control" readOnly>
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" value="{{$nim}}" placeholder="Hallo" class="form-control" readOnly>
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
                    <label for="">Keterangan (Jam dimulainya)</label>
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
            @if($peminjaman->status == "Sudah")
            color:  '#01579b'
            @elseif($peminjaman->status == "Belum")
            color:  '#ff9100'
            @elseif($peminjaman->status == "Batal")
            color:  '#b71c1c'
            @endif
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
@section('header')
<h1><span class="pull-right">{{$nama."(".$nim.")"}}</span><span>Peminjaman Ruang</span></h1>
@endsection
@section('nama')
	{{$nama}}
@endsection
