<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadualTindakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadual_tindakans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('kawasan_id');
            $table->integer('pegawaiVektor_id');
            $table->string('mesej');
            $table->date('tarikh_mula');
            $table->string('status');

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
        Schema::drop('jadual_tindakans');
    }
}
