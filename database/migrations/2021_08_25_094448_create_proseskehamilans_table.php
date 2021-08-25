<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProseskehamilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proseskehamilans', function (Blueprint $table) {
            $table->id();

            $table->integer('id_riwayat');
            $table->string('tanggal');
            $table->integer('umur_kehamilan');
            $table->string('k');
            $table->string('hb');
            $table->string('lila');
            $table->integer('bb');
            $table->integer('tinggi_fut');
            $table->string('letak_janin');
            $table->string('dda');
            $table->string('keluhan');
            $table->string('tindakan');
            $table->string('konseling');
            $table->string('n/r');
            $table->string('paraf');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proseskehamilans');
    }
}
