<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_pemohon');
			$table->string('jenis_pemohon');
			$table->string('jenis_permohonan');
			$table->string('id_surat_tanah');
			$table->string('lokasi_tanah');
			$table->string('status_perizinan');
			$table->integer('biaya_retribusi');
			$table->string('bukti_pembayaran');
			$table->string('email_pemohon');
			$table->date('tanggal_dibuat');
			$table->date('tanggal_expired');
			$table->string('lampiran');
			$table->string('key');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perizinans');
	}

}
