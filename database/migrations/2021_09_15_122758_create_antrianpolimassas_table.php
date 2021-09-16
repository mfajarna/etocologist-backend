<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianpolimassasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrianpolimassas', function (Blueprint $table) {
            $table->id();

            $table->integer('id_ibu')->nullable();
            $table->string('no_antrian')->nullable();
            $table->string('status')->nullable();
            $table->string('nama_poli')->nullable();

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
        Schema::dropIfExists('antrianpolimassas');
    }
}
