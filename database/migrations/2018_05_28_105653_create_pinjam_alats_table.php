<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_alats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alat')->unsigned();
            $table->string('nama_alat',200);
            $table->string('id_peminjam',200);
            $table->integer('jumlah')->unsigned();
            $table->string('kegunaan',20)->nullable($value=true);
            $table->text('keterangan');
            $table->date('tgl_pinjam')->nullable($value=true);
            $table->date('tgl_kembali')->nullable($value=true);
            $table->string('status',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjam_alats');
    }
}
