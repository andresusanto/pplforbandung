<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstansiKependudukanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instansi_kependudukan', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('jabatan');
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
		Schema::drop('instansi_kependudukan');
	}

}
