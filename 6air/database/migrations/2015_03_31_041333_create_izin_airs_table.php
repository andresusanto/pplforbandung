<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzinAirsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('izin_airs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_penduduk');
			$table->string('id_lahan');
			$table->string('status');
			$table->string('kategori');
			$table->string('mulai_berlaku');
			$table->string('berlaku_hingga');
			$table->string('deskripsi');
			
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
		Schema::drop('izin_airs');
	}

}
