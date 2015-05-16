<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsahaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usaha',function($table)
		{
			$table->increments('id');
			$table->string('NIK');
			$table->string('nama');
			$table->string('email');
			$table->string('lokasi');
			$table->string('telepon');
			$table->integer('bidang');
			$table->integer('skala');
			$table->boolean('statusizin')->default(0);
			$table->boolean('statuspajak')->default(0);
			$table->string('imagepath');
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
		Schema::drop('usaha');	
	}

}
