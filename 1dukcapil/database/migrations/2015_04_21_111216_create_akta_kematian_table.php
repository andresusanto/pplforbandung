<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktaKematianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akta_kematian', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('waktuMati');
            $table->string('tempatMati');
            $table->date('waktuCetak');
            $table->integer('idPenduduk')->unsigned();
            $table->foreign('idPenduduk')->references('id')
                ->on('penduduk')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
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
		Schema::drop('akta_kematian');
	}

}
