<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddButuhPerpanjanganDiTemplateIzin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('template',function($table){
			$table->tinyInteger('butuh_perpanjangan',0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::tale('template',function($table){
			$table->dropColumn(['butuh_perpanjangan']);
		});
	}

}
