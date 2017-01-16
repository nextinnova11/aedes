<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadualBanciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadual_bancians', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pembanci_id');
            $table->integer('kawasan_id');
            $table->date('tarikh_mula');
            $table->date('tarikh_akhir');
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
        Schema::drop('jadual_bancians');
    }
}
