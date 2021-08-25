<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatkehamilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatkehamilans', function (Blueprint $table) {
            $table->id();

            $table->integer('id_ibu');
            $table->string('gpa');
            $table->string('jarak_kehamilan');
            $table->string('siklus_haid');
            $table->integer('tinggi_badan');
            $table->string('kb_sebelum_hamil');
            $table->string('riwayat_penyakit')->nullable();
            $table->json('riwayat_persalinan')->nullable();

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
        Schema::dropIfExists('riwayatkehamilans');
    }
}
