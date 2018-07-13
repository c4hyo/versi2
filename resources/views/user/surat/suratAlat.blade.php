<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
#dua{
	border: 2px solid-black;
}
</style>
<body onload="window.print()">
	<page size="A4">
		<table border="4px solid-black">
			<tr>
				<td style="width: 25%"><center><img src="{{url('img/undip.png')}}" style="margin-top: 0.2cm;margin-bottom: 0.2cm;"></center></td>
				<td style="width: 75%"><h3 style="padding-left: 2.5cm;padding-right: 2.5cm;font-size: 18px;" align="center"><b>PEMINJAMAN ALAT<br>LABORATORIUM SISTEM EMBEDDED DAN <br> ROBOTIKA</b></h3></td>
			</tr>
		</table>
		<div style="margin-top: 1cm">
			<table>
				@foreach($data2 as $daftar)
				<tr id="tr">
					<td style="width: 30%"><p>Nama</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$daftar->nama}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>NIM</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$daftar->username}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>No HP</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$daftar->no_hp}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>Judul TA</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$judul}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>Pembimbing 1</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$dos1}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>Pembimbing 2</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$dos2}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>Tanggal Peminjaman</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$daftar->tgl_pinjam}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>Tanggal Penyerahan</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"><p>{{$daftar->tgl_kembali}}</p></td>
				</tr>
				<tr id="tr">
					<td style="width: 30%"><p>Daftar Alat</p></td>
					<td style="width: 5%"><p>:</p></td>
					<td style="width: 65%"></td>
				</tr>
				@endforeach
			</table>
			<center>
				<table style="margin-top: 1cm;" border="2px" id="dua">
					<tr id="dua">
						<th style="width: 10%" id="dua"><p>No</p></th>
						<th style="width: 40%" id="dua"><p>Nama Alat</p></th>
						<th style="width: 10%" id="dua"><p>Jumlah</p></th>
						<th style="width: 40%" id="dua"><p>Keterangan</p></th>
					</tr>
					@php
						$i =1;
					@endphp
					@foreach ($data1 as $data)
						<tr id="dua">
							<td id="dua"><p align="center">{{$i++}}</p></td>
							<td id="dua"><p>{{$data->nama_alat}}</p></td>
							<td id="dua"><p align="center">{{$data->jumlah}}</p></td>
							<td id="dua"><p>{{$data->keterangan}}</p></td>
						</tr>
					@endforeach
				</table>
			</center>
			<center>
				<table style="margin-top: 0.8cm;">
					<tr>
						<td style="width: 50%"></td>
						<td style="width: 50%"><p>Semarang, {{date('d-m-y')}}</p></td>
					</tr>
					<tr>
						<td style="width: 50%"><p>Peminjam Alat</p></td>
						<td style="width: 50%"><p>Ketua Lab Embedded & Robotika</p></td>
					</tr>
					<tr style="height: 3cm;"></tr>
					<tr>
						<td><p>({{$daftar->nama}})</p></td>
						<td><p><u>Eko Didik Widianto, ST.,MT</u></p></td>
					</tr>
					<tr>
						<td></td>
						<td><p>NIP 197705262010121001</p></td>
					</tr>
				</table>
			</center>
		</div>
	</page>
</body>
