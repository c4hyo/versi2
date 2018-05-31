<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alatview', function (Blueprint $table) {
            DB::statement("create view alatView as select `lab_baru`.`peminjams`.`id` AS `id`,`lab_baru`.`pinjam_alats`.`status` AS `status`,`lab_baru`.`peminjams`.`username` AS `nim`,`lab_baru`.`peminjams`.`nama` AS `nama`,`lab_baru`.`pinjam_alats`.`tgl_pinjam` AS `tgl_pinjam`,`lab_baru`.`pinjam_alats`.`tgl_kembali` AS `tgl_kembali`,`lab_baru`.`pinjam_alats`.`keterangan` AS `keterangan`,`lab_baru`.`pinjam_alats`.`nama_alat` AS `nama_alat`,`lab_baru`.`pinjam_alats`.`kegunaan` AS `kegunaan`,`lab_baru`.`pinjam_alats`.`jumlah` AS `jumlah`,`lab_baru`.`peminjams`.`no_hp` AS `no_hp`,`lab_baru`.`peminjams`.`alamat` AS `alamat` from (`lab_baru`.`peminjams` join `lab_baru`.`pinjam_alats` on((`lab_baru`.`peminjams`.`id` = `lab_baru`.`pinjam_alats`.`id_peminjam`)))");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_alatview');
    }
}
