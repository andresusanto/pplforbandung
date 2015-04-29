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
Route::get('home', 'WelcomeController@index');
Route::get('index', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('master_template', 'MasterTemplateController@index');

Route::get('form_permohonan', 'PermohonanController@form');
Route::get('daftar_permohonan', 'PermohonanController@get');
Route::post('editPermohonan', 'PermohonanController@editPermohonan');
Route::post('enrollPermohonan', 'PermohonanController@enrollPermohonan');
Route::get('enrollPermohonan', 'PermohonanController@getEnrollPermohonan');
Route::post('permohonan', 'PermohonanController@entry');
Route::post('updatePermohonan', 'PermohonanController@update');
Route::post('bayarRetribusi', 'PermohonanController@bayarRetribusi');
Route::post('updateBayarRetribusi', 'PermohonanController@updateBayarRetribusi');

// route for admin page

Route::get('admin/login', 'AdminController@getLogin');
Route::post('login_admin', 'AdminController@postLogin');
Route::get('admin/home', 'AdminController@getAdmin');
Route::get('admin/daftar_permohonan', 'AdminController@getPermohonan');
Route::get('admin/laporan', 'AdminController@viewLaporan');
Route::post('admin/editPermohonan', 'AdminController@editPermohonan');
Route::post('admin/updatePermohonan', 'AdminController@updatePermohonan');
Route::post('admin/generateLaporan', 'AdminController@generateLaporan');
Route::get('admin/logout', 'AdminController@logout');

//delete permohonan

Route::get('admin/delete_permohonan/{id}', 'AdminController@deletePermohonan');
Route::get('delete_permohonan/{id}', 'PermohonanController@deletePermohonan');