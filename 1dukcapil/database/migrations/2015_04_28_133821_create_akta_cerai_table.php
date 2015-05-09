<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktaCeraiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akta_cerai', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('waktuCerai');
            $table->date('waktuCetak');
            $table->integer('suami')->unsigned();
            $table->foreign('suami')->references('id')
                ->on('penduduk')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->integer('istri')->unsigned();
            $table->foreign('istri')->references('id')
                ->on('penduduk')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('keadaanIstri');
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
		Schema::table('akta_cerai', function(Blueprint $table)
		{
            Schema::drop('akta_nikah');
		});
	}

}
