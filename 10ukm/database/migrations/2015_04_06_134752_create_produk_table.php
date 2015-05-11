<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produk',function($table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->integer('jenis');
			$table->text('deskripsi');
			$table->boolean('status')->default(0);
			$table->integer('id_usaha');
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
		Schema::drop('produk');
	}

}
