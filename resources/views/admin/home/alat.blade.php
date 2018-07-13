<center><h1>Data Peminjam Alat <br>Laboratorium Sistem Tertanam dan Robotika</h1></center>
<center><h4>Range: {{" ".$awal." "}} s/d{{" ".$akhir}} </h4></center>
<center>
      <table border="1px" cellpadding="1px">
    <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>NIM</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Nama Alat</th>
        <th>Jumlah</th>
        <th>Status</th>
    </tr>
    @php
    $no = 1;
    @endphp
@foreach($alat as $alat)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$alat->nama}}</td>
        <td>{{$alat->username}}</td>
        <td>{{$alat->tgl_pinjam}}</td>
        <td>{{$alat->tgl_kembali}}</td>
        <td>{{$alat->nama_alat}}</td>
        <td>{{$alat->jumlah}}</td>
        @if($alat->status == "P Kembali")
        <td>Proses Kembali</td>
        @elseif($alat->status == "Terima")
        <td>Alat Sudah Kembali</td>
        @else
        <td>{{$alat->status." Disetujui"}}</td>
        @endif
    </tr>
@endforeach
    </table>
</center>
