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
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
  padding: 1cm 2cm 2cm 2cm;
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
#tr td{
	padding-bottom: 0cm;
}
p{
	font-size:12pt;
}
</style>
<body>
	<page size="A4">
		<table border="4px solid-black">
			<tr>
				<td style="width: 25%"><center><img src="{{url('img/undip.jpg')}}" style="margin-top: 0.2cm;margin-bottom: 0.2cm; width:;height:;"></center></td>
				<td style="width: 75%"><h3 style="padding-left: 2.5cm;padding-right: 2.5cm;font-size: 18px;" align="center"><b>FORMULIR PERMOHONAN<br>PERIZINAN PENGGUNAAN LABORATORIUM <br>SISTEM EMBEDDED & ROBOTIKA</b></h3></td>
			</tr>
		</table>
		<div style="margin-top: 1cm">
			<title>Surat Ruangan CIE</title>
			<div>
				<table>
					<tr id="tr">
						<td style="width:30%;"><p>NamaCIE</p></td>
						<td style="width:5%;"><p>:</p></td>
						<td style="width:65%;"><p></p></td>
						<td rowspan="7"><img src="" style="width: 4cm;height: 6cm;"></td>
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
						<td><p></p></td>
					</tr>
					<tr id="tr">
						<td><p>No. Telp/HP</p></td>
						<td><p>:</p></td>
						<td><p></p></td>
					</tr>
					<tr id="tr">
						<td><p>Alamat</p></td>
						<td><p>:</p></td>
						<td><p></p></td>
					</tr>
					<tr id="tr">
						<td><p>Keperluan</p></td>
						<td><p>:</p></td>
						<td><p></p></td>
					</tr>
				{{-- </table>
				<table> --}}
					<tr><td colspan="4" style="padding-bottom: 0.3cm;"><p>Menyampaikan Permohonan untuk melakukan kegiatan penelitian: <br></p></td></tr>
			{{-- 	</table>
				<table style="margin-top: 0.5cm;"> --}}
					<tr id="tr">
						<td style="width: 30%"><p>Judul</p></td>
						<td style="width: 5%"><p>:</p></td>
						<td style="width: 65%"><p></p></td>
					</tr>
					<tr id="tr">
						<td ><p>Dosen Pembimbing 1</p></td>
						<td><p>:</p></td>
						<td ><p></p></td>
					</tr>
					<tr id="tr">
						<td style="width: 30%"><p>Dosen Pembimbing 2</p></td>
						<td style="width: 5%"><p>:</p></td>
						<td style="width: 65%"><p></p></td>
					</tr>
				</table>
			</div>
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
				<p>()</p>
			</div>
		</div>
		<div style="padding-top: 2cm;">
			<p>Keterangan:</p>
			<p>1. Melampirkan Scan Kartu Tanda Mahasiswa (KTM)</p>
		</div>
	</page>
</body>
