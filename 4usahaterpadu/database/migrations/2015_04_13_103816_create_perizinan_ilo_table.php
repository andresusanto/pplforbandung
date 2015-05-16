<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinanIloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinan_ilo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_pemohon');
			$table->string('nama_pemohon');
			$table->string('jabatan_pemohon');
			$table->string('alamat_pemohon');
			$table->string('nama_perusahaan');
			$table->string('alamat_perusahaan');
			$table->string('akta_pendirian');
			$table->string('npwp');
			$table->string('luas_perusahaan');
			$table->string('letak_blok_perusahaan');
			$table->string('letak_kelurahan_perusahaan');
			$table->string('letak_kecamatan_perusahaan');
			$table->string('kondisi_perusahaan');
			$table->string('nomor_persil');
			$table->string('nama_pemilik');
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
		Schema::drop('perizinan_ilo');
	}

}
