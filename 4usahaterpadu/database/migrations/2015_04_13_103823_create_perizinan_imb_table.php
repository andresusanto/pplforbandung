<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinanImbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinan_imb', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_pemohon');
			$table->string('nama_pemohon');
			$table->string('jabatan_pemohon');
			$table->string('alamat_pemohon');
			$table->string('lokasi_kampung_lahan');
			$table->string('lokasi_kelurahan_lahan');
			$table->string('lokasi_kecamatan_lahan');
			$table->string('status_lahan');
			$table->string('nomor_surat_kepemilikan');
			$table->string('luas_tanah');
			$table->string('nama_pemilik_lahan');
			$table->integer('jumlah_lantai_bangunan');
			$table->float('luas_lantai_dasar');
			$table->float('luas_lantai_atas');
			$table->float('luas_bangunan_pelengkap');
			$table->float('jumlah_luas_bangunan');
			$table->string('rencana_fungsi_bangunan');
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
		Schema::drop('perizinan_imb');
	}

}
