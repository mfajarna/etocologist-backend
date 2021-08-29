<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputanaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputanaks', function (Blueprint $table) {
            $table->id();

            $table->integer('id_ibu');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');

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
        Schema::dropIfExists('inputanaks');
    }
}
