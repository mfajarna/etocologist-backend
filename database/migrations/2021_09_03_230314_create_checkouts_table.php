<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            $table->string('invoice')->nullable();
            $table->integer('id_ibu')->nullable();
            $table->integer('id_informasiobat')->nullable();
            $table->integer('id_rujukan')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total_obat')->nullable();
            $table->integer('total_layanan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tempat')->nullable();
            $table->integer('total_harga_pembayaran')->nullable();
            $table->integer('total_bayar')->nullable();
            $table->integer('kembalian')->nullable();

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
        Schema::dropIfExists('checkouts');
    }
}
