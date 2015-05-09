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

Route::get('/', function() {
	return Redirect('user');
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// admin stuffs
Route::group(['middleware' => 'admin'], function() {
    Route::controller('kartukeluarga', 'KartuKeluargaController');
    Route::controller('kartutandapenduduk', 'KartuTandaPendudukController');
    Route::controller('aktakelahiran','AktaKelahiranController');
    Route::controller('aktakematian','AktaKematianController');
    Route::controller('aktanikah','AktaNikahController');
    Route::controller('aktacerai', 'AktaCeraiController');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', function() {
		return Redirect('kartutandapenduduk');
	});
    Route::get('login', 'AdminController@index');
    Route::post('login', 'AdminController@login');
    Route::get('logout', 'AdminController@logout');
});

// user stuffs
Route::group(array('prefix' => 'user'), function() {
	Route::controller('/', 'UserController');
});

// API stuffs
Route::group(array('prefix' => 'api'), function() {
	Route::resource('penduduk', 'PendudukController');
});

// OAuth stuffs
Route::group(array('prefix' => 'oauth'), function() {
	Route::get('wiki', function() {
		return view('oauth.wiki');
	});
	
	Route::get('register', 'OAuthController@getRegister');
	Route::post('register', 'OAuthController@doRegister');
	Route::get('authorize', 'OAuthController@getAuthorize');
	Route::post('authorize', 'OAuthController@doAuthorize');
	Route::post('access_token', 'OAuthController@getAccessToken');
});

