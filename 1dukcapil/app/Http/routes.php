<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('oauth/wiki', function() {
	return view('oauth.wiki');
});
Route::get('oauth/register', 'OAuthController@getRegister');
Route::post('oauth/register', 'OAuthController@doRegister');

Route::get('oauth/authorize', 'OAuthController@getAuthorize');

Route::post('oauth/authorize', 'OAuthController@doAuthorize');

Route::post('oauth/access_token', 'OAuthController@getAccessToken');

Route::resource('api/penduduk', 'PendudukController');
