<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatpersalinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatpersalinans', function (Blueprint $table) {
            $table->id();

            $table->integer('id_riwayat');
            $table->integer('no')->nullable();
            $table->integer('umur')->nullable();
            $table->string('partus')->nullable();
            $table->text('cara')->nullable();
            $table->text('keterangan')->nullable();

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
        Schema::dropIfExists('riwayatpersalinans');
    }
}
