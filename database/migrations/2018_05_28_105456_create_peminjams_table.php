<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('username',15)->unique();
            $table->string('password',65)->default(bcrypt('00000000'));
            $table->string('no_hp')->nullable($value = true);
            $table->text('alamat')->nullable($value = true);
            $table->string('foto')->nullable($value = true);
            $table->string('ktm')->nullable($value = true);
            $table->string('status')->default('Tidak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjams');
    }
}
