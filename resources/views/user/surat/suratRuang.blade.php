<head>
	<meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="author" content="Muchammad Dwi Cahyo Nugroho">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<style>
	body {
  background: rgb(204,204,204);
}
page {
  font-family: "Times New Roman", Times, serif;
 }
p{
	font-size:14pt;
}
</style>
<body onload="window.print()">
	<page size="A4">
		<table border="4px solid-black">
			<tr>
				<td style="width: 25%"><center><img src="{{url('img/undip.png')}}" style="margin-top: 0.2cm;margin-bottom: 0.2cm; width:;height:;"></center></td>
				<td style="width: 75%"><h3 style="padding-left: 2.5cm;padding-right: 2.5cm;font-size: 18px;" align="center"><b>FORMULIR PERMOHONAN<br>PERIZINAN PENGGUNAAN LABORATORIUM <br>SISTEM EMBEDDED & ROBOTIKA</b></h3></td>
			</tr>
		</table>
		<div style="margin-top: 1cm">
			@foreach($peminjam as $peminjam)
			<title>Surat Ruangan ({{$peminjam->nama}})</title>
			<div>
				<table>
					<tr id="tr">
						<td style="width:30%;"><p>Nama</p></td>
						<td style="width:5%;"><p>:</p></td>
						<td style="width:65%;"><p>{{$peminjam->nama}}</p></td>
						<td rowspan="7"><img src="{{$peminjam->foto}}" style="width: 4cm;height: 6cm;"></td>
					</tr>
					<tr id="tr">
						<td><p>Strata Pendidikan</p></td>
						<td><p>:</p></td>
						<td><p>Sarjana Tingkat 1 / S1</p></td>
					</tr>
					<tr id="tr">
						<td><p>Instansi/Universitas</p></td>
						<td><p>:</p></td>
						<td><p>Universitas Diponegoro</p></td>
					</tr>
					<tr id="tr">
						<td><p>NIM/NIP</p></td>
						<td><p>:</p></td>
						<td><p>{{$peminjam->username}}</p></td>
					</tr>
					<tr id="tr">
						<td><p>No. Telp/HP</p></td>
						<td><p>:</p></td>
						<td><p>{{$peminjam->no_hp}}</p></td>
					</tr>
					<tr id="tr">
						<td><p>Alamat</p></td>
						<td><p>:</p></td>
						<td><p>{{$peminjam->alamat}}</p></td>
					</tr>
					<tr id="tr">
						<td><p>Keperluan</p></td>
						<td><p>:</p></td>
						<td><p>{{$peminjam->kegunaan}}</p></td>
					</tr>
				{{-- </table>
				<table> --}}
					<tr><td colspan="4" style="padding-bottom: 0.3cm;"><p>Menyampaikan Permohonan untuk melakukan kegiatan penelitian: <br></p></td></tr>
			{{-- 	</table>
				<table style="margin-top: 0.5cm;"> --}}
					<tr id="tr">
						<td style="width: 30%"><p>Judul</p></td>
						<td style="width: 5%"><p>:</p></td>
						<td style="width: 65%"><p>{{$judul}}</p></td>
					</tr>
					<tr id="tr">
						<td ><p>Dosen Pembimbing 1</p></td>
						<td><p>:</p></td>
						<td ><p>{{$dosen1}}</p></td>
					</tr>
					<tr id="tr">
						<td style="width: 30%"><p>Dosen Pembimbing 2</p></td>
						<td style="width: 5%"><p>:</p></td>
						<td style="width: 65%"><p>{{$dosen2}}</p></td>
					</tr>
				</table>
			</div>
			@endforeach
		</div>
		<div>
			<p align="justify" style="line-height: 1.7">
				Yang bertanda tangan di bawah ini menyatakan bersedia melaksanakan, mematuhi dan menerima sanksi apabila dinytakan melanggar semua ketentuan, tata tertib dan peraturan yang berlaku sebagai konsekuensi dari pelaksanaan kegiatan tersebut.
			</p>
		</div>
		<div class="row">
			<div style="padding-left: 60%">
				<p align="left">Semarang, {{date('d-m-Y')}}</p>
				<p align="left">Pemohon,</p>
				<br><br><br><br>
				<p>({{ $peminjam->nama }})</p>
			</div>
		</div>
		<div style="padding-top: 2cm;">
			<p>Keterangan:</p>
			<p>1. Melampirkan Scan Kartu Tanda Mahasiswa (KTM)</p>
		</div>
	</page>
</body>
