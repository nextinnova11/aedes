<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiVektorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_vektors', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->string('no_tel');
            $table->string('alamat_1');
            $table->string('alamat_2');
            $table->string('alamat_3');
            $table->integer('poskod');
            $table->string('bandar');
            $table->string('negeri');
            $table->string('no_pekerja');
            
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
        Schema::drop('pegawai_vektors');
    }
}
