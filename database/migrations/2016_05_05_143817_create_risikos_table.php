<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisikosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risikos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('kawasan_id');
            $table->date('tarikh_mula');
            $table->integer('soalan_dijawab');
            $table->integer('jumlah_soalan');
            $table->float('keputusan_bancian');

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
        Schema::drop('risikos');
    }
}
