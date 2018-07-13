<center><h1>Data Peminjam Ruang <br>Laboratorium Sistem Tertanam dan Robotika</h1></center>
<center><h4>Range: {{" ".$awal." "}} s/d{{" ".$akhir}} </h4></center>
<center>
    <table border="1px" cellpadding="1px">
    <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>NIM</th>
        <th>Tanggal Pinjam</th>
        <th>Kegunaan</th>
        <th>Status</th>
    </tr>
@php
    $no = 1;
@endphp
@foreach($ruang as $ruang)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$ruang->nama}}</td>
        <td>{{$ruang->username}}</td>
        <td>{{$ruang->tgl_pinjam}}</td>
        <td>{{$ruang->kegunaan}}</td>
        <td>{{$ruang->status." Disetujui"}}</td>
    </tr>
@endforeach
    </table>
</center>
