<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayarPajaksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bayar_pajaks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('npwpd');
			$table->enum('jenis_pajak',['Pajak Penghasilan','Pajak Restoran', 'Pajak Hiburan', 'Pajak Hotel', 'Pajak Bumi & Bangunan']);
			$table->integer('masa_pajak')->default(0);
			$table->string('nomor_stp')->default('');
			$table->integer('jumlah_pembayaran')->default(0);
			$table->enum('status_pembayaran', ['lunas', 'tertunggak']);
			$table->date('tanggal_pembayaran');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bayar_pajaks');
	}

}