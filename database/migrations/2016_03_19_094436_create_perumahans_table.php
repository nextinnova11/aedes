<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerumahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perumahans', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama');
            $table->string('bandar');
            $table->string('negeri');
            $table->integer('ketualokaliti_id');

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
        Schema::drop('perumahans');
    }
}
