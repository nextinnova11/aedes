<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancians', function (Blueprint $table) {
            $table->increments('id');

            $table->text('tempat_diperiksa');
            $table->text('soalan_1');
            $table->text('soalan_2');
            $table->text('soalan_3');
            $table->text('soalan_4');
            $table->text('soalan_5');
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
        Schema::drop('bancians');
    }
}
