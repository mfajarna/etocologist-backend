<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungankeadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungankeadaans', function (Blueprint $table) {
            $table->id();

            $table->integer('id_riwayatkeadaan')->nullable();
            $table->integer('id_anak')->nullable();
            $table->integer('bulan')->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('bb')->nullable();
            $table->string('pb')->nullable();
            $table->string('lk')->nullable();
            $table->string('asi')->nullable();
            $table->string('pasi')->nullable();
            $table->string('mpa')->nullable();
            $table->string('imunisasi')->nullable();
            $table->string('perkembangan_kesehatan')->nullable();
            $table->string('th')->nullable();
            $table->text('nasehat')->nullable();

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
        Schema::dropIfExists('kunjungankeadaans');
    }
}
