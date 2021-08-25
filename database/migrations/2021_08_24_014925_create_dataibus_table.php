<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataibusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataibus', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->integer('umur');
            $table->string('pekerjaan');
            $table->string('htpt');
            $table->string('nama_suami')->nullable();
            $table->integer('umur_suami')->nullable();
            $table->string('pekerjaan_suami')->nullable();
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('posyandu');
            $table->string('no_telp');

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
        Schema::dropIfExists('dataibus');
    }
}
