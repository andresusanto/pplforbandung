<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('izin', function(Blueprint $table)
		{
			$table->increments('id_unique');
			$table->timestamps();
            $table->string('id_izin');
            $table->string('id_pemohon');
            $table->string('jenis_pemohon');
            $table->string('id_surat_tanah');
            $table->date('tanggal_dibuat');
            $table->date('tanggal_expired');
            $table->integer('biaya_retribusi');
            $table->binary('bukti_pembayaran');
            $table->string('email_pemilik');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('izin');
	}

}
