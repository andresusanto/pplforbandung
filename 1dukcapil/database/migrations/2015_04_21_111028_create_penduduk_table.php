<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendudukTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penduduk', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nama');
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan');
            $table->string('pendidikan')->nullable();
            $table->string('jenisKelamin');
            $table->string('tempatLahir');
            $table->datetime('waktuLahir');
            $table->string('golonganDarah');
            $table->string('statusPernikahan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->integer('ayah')->unsigned()->nullable();
            $table->foreign('ayah')->references('id')
                ->on('penduduk');
            $table->integer('ibu')->unsigned()->nullable();
            $table->foreign('ibu')->references('id')
                ->on('penduduk');
            $table->timestamps();
		});
		Schema::table('users', function($table)
		{
            $table->foreign('id_penduduk')->references('id')
                ->on('penduduk');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('penduduk');
	}

}
