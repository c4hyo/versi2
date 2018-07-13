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
    <!-- <div style="margin-top:15px;margin-bottom:20px;"></div> -->
    <div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <h3>Unduh Data Peminjam</h3>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h4>Peminjam Alat</h4>
            <div>
                <form action="{{url('/bukanwp-admin/unduh/alat')}}" method="post">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" name="awal" id="" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" name="akhir" id="" required class="form-control">
                    </div>
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="submit" value="Cetak" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h4>Peminjam Ruang</h4>
            <div>
                <form action="{{url('/bukanwp-admin/unduh/ruang')}}" method="post">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" name="awal" id="" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" name="akhir" id="" required class="form-control">
                    </div>
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="submit" value="Cetak" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-8 col-xs-12">
            <div class="thumbnail" id="calendar"></div>
        </div>
        <div class="thumbnail col-sm-4 col-md-4 col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="online">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Pengguna</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-8 col-xs-12">
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
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#online').DataTable({
        paging      : false,
        lengthChange: false,
        searching   : false,
        ordering    : true,
        info        : true,
        autoWidth   : false,
    	processing 	: 	true,
    	serverSide	: 	true,
    	ajax		: 	"{{route('Online')}}",
    	columns		: 	[
    		{data:'nama',name:'nama'},
            {data:'status',"render":function(data,type,row,meta){
                return '<i class="fa fa-circle text-success"></i>&nbsp;'+data;
            }},

    	]
    })
});
</script>
@endsection
