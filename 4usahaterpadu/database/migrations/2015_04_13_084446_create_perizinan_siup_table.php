<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinanSiupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinan_siup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_pemohon');
			$table->string('nama_pemilik');
			$table->string('alamat_pemilik');
			$table->string('tempat_lahir_pemilik');
			$table->string('nomor_telepon_pemilik');
			$table->string('nomor_ktp_pemilik');
			$table->string('kewarganegaraan_pemilik');
			$table->string('nama_perusahaan');
			$table->string('alamat_perusahaan');
			$table->string('nomor_telepon_perusahaan');
			$table->string('provinsi_perusahaan');
			$table->string('kabupaten_perusahaan');
			$table->string('kecamatan_perusahaan');
			$table->string('kelurahan_perusahaan');
			$table->string('status_perusahaan');
			$table->string('kodepos_perusahaan');
			$table->string('nomor_akta_pendirian');
			$table->string('nomor_pengesahan_pendirian');
			$table->string('nomor_akta_perubahan');
			$table->string('nomor_pengesahan_perubahan');
			$table->string('modal_perusahaan');
			$table->string('total_saham');
			$table->string('persen_nasional');
			$table->string('persen_asing');
			$table->string('kelembagaan');
			$table->string('kegiatan_usaha');
			$table->string('dagangan_utama');
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
		Schema::drop('perizinan_siup');
	}

}
