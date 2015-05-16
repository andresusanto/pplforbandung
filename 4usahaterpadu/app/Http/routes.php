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
Route::get('listperizinan', 'PerizinanController@showListPerizinan');

Route::get('detailperizinan/{str}', 'PerizinanController@showDetailPerizinan');

Route::get('isiform/{str}', 'PerizinanController@showFormulir');

Route::patch('upload/{str}', 'PerizinanController@uploadFormulir');

Route::get('uploaddokumenawal/{str}/{id}', 'PerizinanController@uploadDokumenAwal');

Route::patch('uploaddokumenawal/{str}/{id}', 'PerizinanController@upload');

Route::get('listformulir', 'PerizinanController@showListFormulir');

Route::get('listizindisahkan/{str}', 'PerizinanController@showListIzinDiterbitkan');

Route::get('detailformulir/{str}/{id}', 'PerizinanController@showDetailFormulir');

Route::get('editformulir/{str}/{id}', 'PerizinanController@showEditFormulir');

Route::patch('editformulir/{str}/{id}', 'PerizinanController@checkEditFormulir');

Route::get('deleteformulir/{str}/{id}', 'PerizinanController@showDeleteFormulir');

Route::get('verifikasiformulir/{str}/{id}', 'PerizinanController@showVerifikasiFormulir');

Route::get('menyetujuiformulir/{str}/{id}', 'PerizinanController@showMenyetujuiFormulir');

Route::get('verifikasikelengkapanformulir/{str}/{id}', 'PerizinanController@showVerifikasiFormulirLengkap');

Route::get('menerbitkanformulir/{str}/{id}', 'PerizinanController@showMenerbitkanFormulir');

Route::get('menolakformulir/{str}/{id}', 'PerizinanController@showMenolakFormulir');

Route::get('menyembunyikanformulir/{str}/{id}', 'PerizinanController@showMenyembunyikanFormulir');

Route::get('loginsso', 'SsoController@login');

Route::get('logoutsso', 'SsoController@logout');

Route::get('login', 'HomeController@login');

Route::get('logout', 'HomeController@logout');

Route::get('clean', 'HomeController@clean');

Route::get('editakun', 'HomeController@editAkun');

Route::patch('login', 'HomeController@checkLogin');

Route::patch('updateakun', 'HomeController@updateAkun');

Route::get('signup', 'HomeController@signup');

Route::patch('signup', 'HomeController@checkSignup');

Route::get('profil', 'HomeController@profil');

Route::get('home', 'HomeController@home');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
