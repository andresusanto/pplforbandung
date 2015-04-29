<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaKartuKeluargaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anggota_kartu_keluarga', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('status');
            $table->string('idKartuKeluarga')->nullable();
            $table->integer('idPenduduk')->unsigned()->nullable();
            $table->foreign('idKartuKeluarga')->references('id')
                ->on('kartu_keluarga')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
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
		Schema::drop('anggota_kartu_keluarga');
	}

}
