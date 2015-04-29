<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengaduans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('kontak');
			$table->string('judul');
			$table->string('aduan');
			$table->string('status');
			
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
		Schema::drop('pengaduans');
	}

}
