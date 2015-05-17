<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWajibPajakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('wajib_pajak', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('npwpd')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('wajib_pajak');
	}

}
