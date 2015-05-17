<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terminals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('nama');
			$table->string('alamat');
		});

		DB::table('terminals')->insert(
        	array(
            'nama' => 'Terminal Bus Leuwi Panjang',
            'alamat' => 'Jl.Soekarno Hatta 205 Bandung'
        	)
    	);

    	DB::table('terminals')->insert(
        	array(
            'nama' => 'Terminal Bus Cicaheum',
            'alamat' => 'Jalan Jend A Yani, Cicaheum, Kiaracondong, Bandung 40282'
        	)
    	);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('terminals');
	}

}
