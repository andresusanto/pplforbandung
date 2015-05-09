<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktaKelahiranTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akta_kelahiran', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('waktuCetak');
//            $table->date('waktuLahir');
//            $table->string('tempatLahir');
//            $table->string('jenisKelahiran');
//            $table->string('anakKe');
//            $table->string('penolongKelahiran');
//            $table->string('berat');
//            $table->integer('pelapor')->unsigned()->nullable();
//            $table->foreign('pelapor')->references('id')
//                ->on('penduduk')->onDelete('CASCADE')
//                ->onUpdate('CASCADE');
//            $table->integer('saksi1')->unsigned()->nullable();
//            $table->foreign('saksi1')->references('id')
//                ->on('penduduk')->onDelete('CASCADE')
//                ->onUpdate('CASCADE');
//            $table->integer('saksi2')->unsigned()->nullable();
//            $table->foreign('saksi2')->references('id')
//                ->on('penduduk')->onDelete('CASCADE')
//                ->onUpdate('CASCADE');
            $table->integer('idPenduduk')->unsigned();
            $table->foreign('idPenduduk')->references('id')
                ->on('penduduk')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
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
		Schema::drop('akta_kelahiran');
	}

}
