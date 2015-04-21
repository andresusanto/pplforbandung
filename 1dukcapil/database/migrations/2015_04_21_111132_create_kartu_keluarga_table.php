<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuKeluargaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kartu_keluarga', function(Blueprint $table)
		{
            $table->string('id');
            $table->primary('id');
            $table->integer('kepalaKeluarga')->unsigned();
            $table->foreign('kepalaKeluarga')->references('id')
                ->on('penduduk')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('kodepos');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->boolean('status');
            $table->date('waktuCetak');
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
		Schema::drop('kartu_keluarga');
	}

}
