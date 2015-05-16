<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinanIuiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinan_iui', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_pemohon');
			$table->string('nama_pemohon');
			$table->string('alamat_pemohon');
			$table->string('nomor_telepon_pemohon');
			$table->string('nama_perusahaan');
			$table->string('alamat_perusahaan');
			$table->string('nomor_telepon_perusahaan');
			$table->string('npwp');
			$table->string('nama_pemilik');
			$table->string('alamat_pemilik');
			$table->string('no_telepon_pemilik');
			$table->string('lokasi_kelurahan_pabrik');
			$table->string('lokasi_kecamatan_pabrik');
			$table->string('lokasi_kabupaten_pabrik');
			$table->string('kepemilikan_pabrik');
			$table->string('luas_bangunan_pabrik');
			$table->string('luas_tanah_pabrik');
			$table->string('alat_utama_produksi');
			$table->string('alat_pembantu_produksi');
			$table->string('tenaga_penggerak');
			$table->string('jenis_industri');
			$table->string('komoditi');
			$table->string('kapasita_terpasang_per_tahun');
			$table->string('kebutuhan_bahan_baku');
			$table->integer('jumlah_tenaga_kerja_pribumi_lk');
			$table->integer('jumlah_tenaga_kerja_pribumi_pr');
			$table->integer('jumlah_tenaga_kerja_asing_lk');
			$table->integer('jumlah_tenaga_kerja_asing_pr');
			$table->integer('nilai_investasi');
			$table->integer('merek');
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
		Schema::drop('perizinan_iui');
	}

}
