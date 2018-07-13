@extends('layout.guest')
{{-- untuk menambahkan css --}}
@section('css')
@endsection
{{-- menambahkan konten atau isi dari web --}}
@section('konten')
	<title>RES Lab | Kegiatan</title>
	<div class="row">
        <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
        <h3>Langkah Peminjaman Alat</h3>
        <br>
            <ul class="list-group">
                <li class="list-group-item">
                    <h4>Langkah 1</h4>
                    <p>Login terlebih dahulu, yaitu dengan memasukan nim sebagai username dan kata sandi, untuk halaman login bisa di akses <a target="_blank" href="{{url('login')}}">disini</a></p>
                    <a href="{{url('img/langkah/login_user.png')}}"><img src="{{url('img/langkah/login_user.png')}}" class="img-rounded img-thumbnail"></a>
                    <p align="right"><small>NB: untuk kata sandi bawaan yaitu 00000000</small></p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 2</h4>
                    <p>Setelah berhasil login, maka akan menuju halaman utama pengguna, seperti pada gambar dibawah ini</p>
                    <a href="{{url('img/langkah/home_user.png')}}"><img src="{{url('img/langkah/home_user.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>Setelah itu anda bisa klik pada ikon&nbsp; <a class="btn btn-default"><i class="fa fa-wrench"></i></a>, maka akan menuju halaman alat</p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 3</h4>
                    <p>Gambar dibawah adalah halaman alat, yang mana terdapat puluhan alat yang tersedia di Laboratorium Sistem Tertanam dan Robotika.</p>
                    <a href="{{url('img/langkah/alat_user.png')}}"><img src="{{url('img/langkah/alat_user.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>Setelah itu, anda dapat memilih alat dan jumlahnya sekalian</p>
                    <p align="right"><small>NB: pemilihan alat hanya dapat dilakukan satu per-satu</small></p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 4</h4>
                    <p>Setelah anda memilih alat yang diinginkan, maka akan menuju halaman keranjang alat, pada halaman ini anda diwajibkan mengisi informasi seperti keperluaan alat, tanggal pinjam, tanggal kembali dan keterangan lain.</p>
                    <a href="{{url('img/langkah/keranjang_user1.png')}}"><img src="{{url('img/langkah/keranjang_user1.png')}}" class="img-rounded img-thumbnail"></a>
                    <a href="{{url('img/langkah/keranjang_user2.png')}}"><img src="{{url('img/langkah/keranjang_user2.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>Setelah selesai memilih, anda bisa tekan tombol pinjam, maka akan menuju halaman utama penggun</p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 5</h4>
                    <p>Untuk halaman utama pengguna akan berubah apabila kita sedang melakukan proses peminjaman alat, menjadi seperti ini</p>
                    <a href="{{url('img/langkah/home_user_alat.png')}}"><img src="{{url('img/langkah/home_user_alat.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>untuk pengguna yang akan meminjam alat, <strong>WAJIB</strong> mencetak surat peminjaman alat terlebih dahulu. Untuk suratnya bisa didapatkan dengan cara
                    klik ikon &nbsp; <a class="btn btn-success"><i class="fa fa-print"></i></a>
                    </p>
                    <p>
                    Setelah itu, tunggu sampai ikon <a class="btn btn-success"><i class="fa fa-print"></i></a> berubah menjadi <a class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    maka anda dapat mengambil alat di Laboratorium Sistem Tertanam dan Robotika
                    </p>
                </li>
            </ul>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
        <h3>Langkah Peminjaman Ruang</h3>
        <br>
            <ul class="list-group">
                <li class="list-group-item">
                    <h4>Langkah 1</h4>
                    <p>Login terlebih dahulu, yaitu dengan memasukan nim sebagai username dan kata sandi, untuk halaman login bisa di akses <a target="_blank" href="{{url('login')}}">disini</a></p>
                    <a href="{{url('img/langkah/login_user.png')}}"><img src="{{url('img/langkah/login_user.png')}}" class="img-rounded img-thumbnail"></a>
                    <p align="right"><small>NB: untuk kata sandi bawaan yaitu 00000000</small></p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 2</h4>
                    <p>Setelah berhasil login, maka akan menuju halaman utama pengguna, seperti pada gambar dibawah ini</p>
                    <a href="{{url('img/langkah/home_user.png')}}"><img src="{{url('img/langkah/home_user.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>Setelah itu anda bisa klik pada ikon&nbsp; <a class="btn btn-default"><i class="fa fa-home"></i></a> maka akan menuju halaman ruang</p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 3</h4>
                    <p>Gambar dibawah adalah halaman untuk peminjaman ruang, terdapat beberapa <i>input-an</i> untuk mengisi beberapa informasi.</p>
                    <a href="{{url('img/langkah/ruang_user.png')}}"><img src="{{url('img/langkah/ruang_user.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>Setelah mengisi beberapa informasi, bisa tekan tombol pinjam</p>
                </li>
                <li class="list-group-item">
                    <h4>Langkah 4</h4>
                    <p>Untuk halaman utama pengguna akan berubah apabila kita sedang melakukan proses peminjaman ruang, menjadi seperti ini</p>
                    <a href="{{url('img/langkah/home_user_ruang.png')}}"><img src="{{url('img/langkah/home_user_ruang.png')}}" class="img-rounded img-thumbnail"></a>
                    <p>untuk pengguna yang akan meminjam ruang, <strong>WAJIB</strong> mencetak surat peminjaman ruang terlebih dahulu. Untuk suratnya bisa didapatkan dengan cara
                    klik ikon &nbsp; <a class="btn btn-success"><i class="fa fa-print"></i></a>
                    </p>
                    <p>
                    Setelah itu, tunggu sampai ikon <a class="btn btn-success"><i class="fa fa-print"></i></a> berubah menjadi <a class="btn btn-warning" disabled><i class="fa fa-check"></i></a>
                    maka anda dapat meminjam ruang pada tanggal yang anda inginkan
                    </p>
                    <small><b><p>NB :</p>
                    <ul>
                    <li><p align="justify">Peminjaman dapat dibatalkan, apabila tanggal yang anda inginkan berbenturan dengan praktikum</p></li>
                    <li><p align="justify">Untuk peminjaman ruang, harus mengunggah scan ktm pada saat akan mencetak surat</p></li>
                    <li><p align="justify">Peminjam tidak bisa meminjam ruangan untuk 1 kegiatan lebih dari 1 kali, misal meminjam kegiatan untuk Seminar Tugas Akhir,
                    maka anda tidak dapat meminjam ruang untuk Seminar Tugas Akhir kecuali pernah dibatalkan</p></li>
                    </ul>
                    </b></small>
                </li>
            </ul>
        </div>
	</div>
@endsection
{{-- menambahkan javascript --}}
@section('js')

@endsection
@section('navbar')
<li class=""><a href="{{url('/kegiatan')}}">Kegiatan</a></li>
<li class=""><a href="{{url('/alat')}}">Daftar Alat Lab</a></li>
<li class="active"><a href="{{url('/langkah-peminjaman')}}">Langkah Peminjaman</a></li>
@endsection
