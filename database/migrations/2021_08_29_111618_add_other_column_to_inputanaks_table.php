<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherColumnToInputanaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inputanaks', function (Blueprint $table) {
            $table->integer('bb')->nullable();
            $table->string('keadaan_lahir')->nullable();
            $table->string('proses_lahir')->nullable();
            $table->string('letak_janin')->nullable();
            $table->string('cara_lahir')->nullable();
            $table->integer('bblr')->nullable();
            $table->string('lahir_di')->nullable();
            $table->string('ditolong_oleh')->nullable();
            $table->string('jenis_imunisasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inputanaks', function (Blueprint $table) {
            //
        });
    }
}
