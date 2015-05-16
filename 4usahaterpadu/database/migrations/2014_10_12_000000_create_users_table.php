<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->string('id');
			$table->integer('peran')->default(3);
			$table->timestamps();
		});

		$user = new User;
		$user->id = "1042301403195435";
		$user->peran = 1;
		$user->save();

		$user2 = new User;
		$user2->id = "5633850071023425";
		$user2->peran = 2;
		$user2->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
