<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPerusahaanColumnToIzin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('izin',function($table){
			$table->string('nama_perusahaan',100);
			$table->text('alamat_perusahaan');
			$table->text('alamat_garasi');
			$table->string('npwp',100);
			$table->date('tanggal_perpanjangan')->nullable();
		});
		Schema::table('jenisizin',function($table){
			$table->integer('tahun_berlaku')->default(5);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('izin',function($table){
			$table->dropColumn(['alamat_garasi','alamat_perusahaan','nama_perusahaan','npwp','masa_berlaku']);
		});
		Schema::table('jenisizin',function($table){
			$table->dropColumn(['tahun_berlaku']);
		});
	}

}
