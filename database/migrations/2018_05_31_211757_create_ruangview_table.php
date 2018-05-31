<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuangviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangview', function (Blueprint $table) {
          DB::statement("create view ruangView as select `lab_baru`.`peminjams`.`username` AS `username`,`lab_baru`.`peminjams`.`ktm` AS `ktm`,`lab_baru`.`peminjams`.`nama` AS `nama`,`lab_baru`.`peminjams`.`foto` AS `foto`,`lab_baru`.`peminjams`.`no_hp` AS `no_hp`,`lab_baru`.`peminjams`.`alamat` AS `alamat`,`lab_baru`.`ruangs`.`kegunaan` AS `kegunaan`,`lab_baru`.`ruangs`.`tgl_pinjam` AS `tgl_pinjam`,`lab_baru`.`ruangs`.`keterangan` AS `keterangan`,`lab_baru`.`ruangs`.`status` AS `status` from (`lab_baru`.`peminjams` join `lab_baru`.`ruangs` on((`lab_baru`.`peminjams`.`username` = `lab_baru`.`ruangs`.`id_peminjam`)))");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_ruangview');
    }
}
