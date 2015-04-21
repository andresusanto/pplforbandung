<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthAuthCodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oauth_auth_codes', function(Blueprint $table)
		{
            $table->string('id', 40)->primary();
            $table->integer('session_id')->unsigned();
            $table->string('redirect_uri');
            $table->integer('expire_time');

            $table->timestamps();

            $table->index('session_id');

            $table->foreign('session_id')
                  ->references('id')->on('oauth_sessions')
                  ->onDelete('cascade');
		});
		Schema::create('oauth_auth_code_scopes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_code_id', 40);
            $table->string('scope_id', 40);

            $table->timestamps();

            $table->index('auth_code_id');
            $table->index('scope_id');

            $table->foreign('auth_code_id')
                  ->references('id')->on('oauth_auth_codes')
                  ->onDelete('cascade');

            $table->foreign('scope_id')
                  ->references('id')->on('oauth_scopes')
                  ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$this->schema()->table('oauth_auth_codes', function (Blueprint $table) {
            $table->dropForeign('oauth_auth_codes_session_id_foreign');
        });
		Schema::drop('oauth_auth_codes');
	}

}
