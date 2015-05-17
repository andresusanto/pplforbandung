<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasPajak extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('petugas_pajak', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password', 24);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('petugas_pajak');
	}

}
