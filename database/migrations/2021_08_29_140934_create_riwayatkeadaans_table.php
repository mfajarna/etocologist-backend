<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatkeadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatkeadaans', function (Blueprint $table) {
            $table->id();

            $table->integer('id_anak');
            $table->date('tanggal')->nullable();
            $table->integer('minggu_ke')->nullable();
            $table->integer('umur_hari')->nullable();
            $table->integer('bb')->nullable();
            $table->string('pb')->nullable();
            $table->string('st_gizi')->nullable();
            $table->string('makanan')->nullable();
            $table->string('tali_pusat')->nullable();
            $table->string('imunisasi')->nullable();
            $table->string('kk')->nullable();
            $table->string('cacat')->nullable();
            $table->string('gejala')->nullable();
            $table->string('tindakan_nasehat')->nullable();

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
        Schema::dropIfExists('riwayatkeadaans');
    }
}
