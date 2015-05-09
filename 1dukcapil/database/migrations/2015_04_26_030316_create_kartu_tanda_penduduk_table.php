<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuTandaPendudukTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kartu_tanda_penduduk', function(Blueprint $table)
		{
            $table->string('id');
            $table->primary('id');
            $table->date('waktuBerlaku');
            $table->date('waktuCetak');
            $table->integer('idPenduduk')->unsigned();
            $table->foreign('idPenduduk')->references('id')
                ->on('penduduk');
            $table->timestamps();
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('email')->references('id')
                ->on('kartu_tanda_penduduk');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kartu_tanda_penduduk');
	}

}
