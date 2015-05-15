<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahKolomApakahDokumenButuhDiuploadAtauTidak extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('template',function($table){
			$table->tinyInteger('butuh_upload')->default(1);
			$table->string('keterangan',100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('template',function($table){
			$table->dropColumn(['butuh_upload','keterangan']);

		});
	}

}
