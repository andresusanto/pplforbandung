<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerizinanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perizinan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_pemohon');
			$table->integer('id_izin');
			$table->string('kode_izin')->default("0");
			$table->string('jenis_izin');
			$table->string('status')->default("Tertunda");
			$table->string('updated')->default("false");
			$table->string('updated_by_user')->default("false");
			$table->string('updated_by_bppt')->default("false");
			$table->string('updated_by_mayor')->default("false");
			$table->string('disembunyikan')->default("false");
			$table->string('deleted')->default("false");
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
		Schema::drop('perizinan');
	}

}
