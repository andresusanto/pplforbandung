<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktaNikahTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akta_nikah', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('waktuNikah');
            $table->string('tempatNikah');
            $table->date('waktuCetak');
            $table->integer('suami')->unsigned()->nullable();
            $table->foreign('suami')->references('id')
                ->on('penduduk')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->integer('istri')->unsigned()->nullable();
            $table->foreign('istri')->references('id')
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
		Schema::drop('akta_nikah');
	}

}
