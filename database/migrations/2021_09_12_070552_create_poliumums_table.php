<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliumumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poliumums', function (Blueprint $table) {
            $table->id();

            $table->integer('id_ibu')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('tensi')->nullable();
            $table->string('bb')->nullable();
            $table->string('lab')->nullable();
            $table->string('pemeriksaan')->nullable();
            $table->string('theraphi')->nullable();
            $table->string('ket')->nullable();

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
        Schema::dropIfExists('poliumums');
    }
}
