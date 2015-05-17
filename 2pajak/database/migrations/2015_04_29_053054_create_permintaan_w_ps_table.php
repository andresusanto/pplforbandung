<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanWPsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permintaan_w_ps', function(Blueprint $table)
		{
			// keperluan seluruh permintaan
			$table->increments('id');
			$table->string('npwpd');
			$table->enum('kategori_permintaan', ['keberatan pajak', 'pengurangan sanksi', 'pencabutan wp']);
			$table->enum('status_permintaan', ['pending', 'disetujui', 'ditolak'])->default('pending');

			// keperluan pengajuan keberatan pajak
			$table->enum('jenis_pajak',['Pajak Penghasilan','Pajak Restoran', 'Pajak Hiburan', 'Pajak Hotel', 'Pajak Bumi & Bangunan']);
			$table->integer('tahun_pajak')->default(0);
			$table->string('alasan_pengaduan')->default('');
			$table->integer('harga_pajak_seharusnya')->default(0);
			
			// keperluan pengajuan pengurangan sanksi
			$table->string('jenis_sanksi')->default('');
			$table->string('nomor_stp')->default('');
			$table->integer('jumlah_sanksi')->default(0);
			$table->string('alasan_permohonan')->default('');

			// keperluan pencabutan wp
			//isi kolom merupakan teks yang didapat dari enumerasi pada form
			$table->string('alasan_penghapusan')->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permintaan_w_ps');
	}

}
