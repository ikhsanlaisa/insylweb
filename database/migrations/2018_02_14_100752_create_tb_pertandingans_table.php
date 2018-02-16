<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPertandingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pertandingans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jadwal_id')->unsigned();
            $table->string('keterangan');
            $table->integer('pemenang_id')->unsigned();
            $table->string('foto');
            $table->timestamps();

            $table->foreign('jadwal_id')->references('id')->on('tb_jadwals')->onUpdate('cascade')->onUpdate('cascade');
            $table->foreign('pemenang_id')->references('id')->on('tb_kelas')->onUpdate('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pertandingans');
    }
}
