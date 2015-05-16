<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinanHoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinan_ho', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_pemohon');
			$table->string('alamat_pemilik');
			$table->string('kebangsaan');
			$table->string('nama_pengusaha');
			$table->string('nama_perusahaan');
			$table->string('letak_perusahaan');
			$table->string('bentuk_perusahaan');
			$table->string('status_perusahaan');
			$table->string('jenis_usaha');
			$table->string('permohonan');
			$table->float('luas_tanah');
			$table->string('batas_utara');
			$table->string('batas_timur');
			$table->string('batas_selatan');
			$table->string('batas_barat');
			$table->float('luas_bangunan');
			$table->string('keadaan_bangunan');
			$table->string('status_tanah');
			$table->integer('jumlah_tenaga_kerja_pribumi_lk');
			$table->integer('jumlah_tenaga_kerja_pribumi_pr');
			$table->integer('jumlah_tenaga_kerja_asing_lk');
			$table->integer('jumlah_tenaga_kerja_asing_pr');
			$table->string('banyak_peralatan');
			$table->string('sumber_air');
			$table->float('jumlah_jam_kerja');
			$table->string('lain_lain');
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
		Schema::drop('perizinan_ho');
	}

}
