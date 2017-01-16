<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawapanBanciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawapan_bancians', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('kawasan_id');
            $table->string('jalan_blok');
            $table->date('tarikh_mula');
            // $table->string('no_rumah')->unique();
            $table->string('no_rumah');
            $table->integer('q1_1');
            $table->integer('q1_2');
            $table->integer('q2_1');
            $table->integer('q2_2');
            $table->integer('q3_1');
            $table->integer('q3_2');
            $table->integer('q4_1');
            $table->integer('q4_2');
            $table->integer('q5_1');
            $table->integer('q5_2');
            $table->integer('q5_3');
            $table->integer('q6_1');
            $table->integer('q6_2');
            $table->integer('q7_1');
            $table->integer('q7_2');
            $table->integer('q7_3');
            $table->integer('q8_1');
            $table->integer('q8_2');
            $table->integer('q8_3');
            $table->integer('q9_1');
            $table->integer('q9_2');
            $table->integer('q9_3');
            $table->integer('q9_4');
            $table->integer('q9_5');
            $table->integer('q10_1');
            $table->integer('q10_2');
            $table->integer('q10_3');
            $table->integer('q11_1');
            $table->integer('q12_1');
            $table->integer('q12_2');
            $table->integer('q12_3');
            $table->integer('q13_1');
            $table->integer('q13_2');
            $table->integer('q14_1');
            $table->integer('q14_2');
            $table->integer('q14_3');
            $table->integer('q15_1');
            $table->integer('q16_1');
            $table->integer('q16_2');
            $table->integer('q17_1');
            $table->integer('q18_1');
            $table->integer('q19_1');
            $table->integer('q19_2');
            $table->integer('q20_1');
            $table->integer('q20_2');

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
        Schema::drop('jawapan_bancians');
    }
}
