<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_pertandingans', function (Blueprint $table) {
            $table->integer('tim2')->unsigned();
            $table->string('score');
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pertandingans', function (Blueprint $table) {
            $table->dropColumn('tim2');
            $table->dropColumn('score');
            $table->dropColumn('lokasi');
        });
    }
}
