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

Route::get('/', 'ssoController@index');

Route::get('home', 'HomeController@index');

Route::get('daftar-usaha', "UsahaController@index");

Route::post('daftar-usaha/search', "UsahaController@search");

Route::get('daftar-usaha/sort/{category}', "UsahaController@sort");

Route::get('getlaporan', "UsahaController@createpdf");

Route::get('daftar-usaha/{id}',"UsahaController@show");

Route::get('registrasi-usaha',"UsahaController@create");

Route::get('admin', 'AdminController@index');

Route::get('admin/{id}',"AdminController@show");

Route::get('edit-usaha-admin/{id}',"AdminController@edit");

Route::post('daftar-usaha',"UsahaController@store");

Route::get('edit-usaha/{id}',"UsahaController@edit");

Route::post('gantiusaha/{id}',"UsahaController@update");

Route::delete('deleteusaha/{id}', "UsahaController@destroy");

Route::get('download/{id}',"UsahaController@download");

Route::delete('hapusproduk/{id}',"ProdukController@destroy");

Route::post('terimaproduk/{id}',"ProdukController@update");

Route::get('registrasi-produk/{id_usaha}',"ProdukController@create");

Route::post('tambahproduk/{id_usaha}',"ProdukController@store");

Route::post('gantiusahaAdmin/{id}',"AdminController@update");

Route::get('pemberian-izin/{id}',"AdminController@izin");

Route::delete('deleteusahaAdmin/{id}', "AdminController@destroy");

Route::get('loginsso', 'ssoController@login');
//Route::get('registrasi-produk',"ProdukController@create");

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
