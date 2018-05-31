<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->integer('stok')->unsigned();
            $table->string('satuan',20)->nullable($value = true);
            $table->string('merk',40)->nullable($value = true);
            $table->text('keterangan')->nullable($value = true);
            $table->string('gambar')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alats');
    }
}
