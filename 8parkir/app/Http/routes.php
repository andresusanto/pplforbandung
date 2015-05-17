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

Route::get('/', array(
	'as' => 'home',
	'uses' => 'PermohonanController@index')
	);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('form_permohonan', array(
	'as' => 'form_permohonan', 
	'uses' => 'PermohonanController@form')
	);

Route::get('daftar_permohonan', array(
	'as' => 'daftar_permohonan',
	'uses' => 'PermohonanController@get')
	);

Route::post('editPermohonan', array(
	'as' => 'editPermohonan',
	'uses' => 'PermohonanController@editPermohonan')
	);

Route::post('permohonan', array(
	'as' => 'permohonan',
	'uses' => 'PermohonanController@entry')
	);

Route::post('updatePermohonan', array(
	'as' => 'updatePermohonan',
	'uses' => 'PermohonanController@update')
	);

Route::post('bayarRetribusi', array(
	'as' => 'bayarRetribusi',
	'uses' => 'PermohonanController@bayarRetribusi')
	);

Route::post('updateBayarRetribusi', array(
	'as' => 'updateBayarRetribusi',
	'uses' => 'PermohonanController@updateBayarRetribusi')
	);

//route for download file

Route::get('downloadLampiran/{filename}', array(
	'as' => 'downloadLampiran',
	'uses'=>'DownloadController@downloadLampiran')
	);
Route::get('downloadBuktiPembayaran/{filename}', array(
	'as' => 'downloadBuktiPembayaran',
	'uses'=>'DownloadController@downloadBuktiPembayaran')
	);

//route for perizinan

Route::get('daftar_izin', array(
	'as' => 'daftar_izin',
	'uses' => 'PermohonanController@getDaftarIzin')
	);

Route::post('perpanjangKontrak', array(
	'as' => 'perpanjangKontrak',
	'uses' => 'PermohonanController@perpanjangKontrak')
	);

Route::post('updatePerpanjangKontrak', array(
	'as' => 'updatePerpanjangKontrak',
	'uses' => 'PermohonanController@updatePerpanjangKontrak')
	);

Route::post('bayarPerpanjangKontrak', array(
	'as' => 'bayarPerpanjangKontrak',
	'uses' => 'PermohonanController@bayarPerpanjangKontrak')
	);

Route::post('updateBayarPerpanjangKontrak', array(
	'as' => 'updateBayarPerpanjangKontrak',
	'uses' => 'PermohonanController@updateBayarPerpanjangKontrak')
	);

// route for admin page
Route::get('admin/', array(
	'as' => 'admin.home',
	'array' => 'AdminController@home'
	)
	);

Route::get('admin/login', array(
	'as' => 'admin/login',
	'uses' => 'AdminController@getLogin')
	);

Route::post('login_admin', array(
	'as' => 'login_admin',
	'uses' => 'AdminController@postLogin')
	);

Route::get('admin/home', array(
	'as' => 'admin/home',
	'uses' => 'AdminController@getAdmin')
	);

Route::get('admin/daftar_permohonan', array(
	'as' => 'admin/daftar_permohonan',
	'uses' => 'AdminController@getPermohonan')
	);

Route::get('admin/laporan', array(
	'as' => 'admin/laporan',
	'uses' => 'AdminController@viewLaporan')
	);

Route::post('admin/editPermohonan', array(
	'as' => 'admin/editPermohonan',
	'uses' => 'AdminController@editPermohonan')
	);

Route::post('admin/updatePermohonan', array(
	'as' => 'admin/updatePermohonan',
	'uses' => 'AdminController@updatePermohonan')
	);

Route::post('admin/generateLaporan', array(
	'as' => 'admin/generateLaporan',
	'uses' => 'AdminController@generateLaporan')
	);

Route::get('admin/logout', array(
	'as' => 'admin/logout',
	'uses' => 'AdminController@logout')
	);

Route::post('admin/generatePDF', array(
	'as' => 'admin/generatePDF',
	'uses' => 'AdminController@generatePDF')
	);	

Route::get('admin/daftar_izin', array(
	'as' => 'admin/daftar_izin',
	'uses' => 'AdminController@getPerizinan')
	);

Route::post('admin/generateSuratIzin', array(
	'as' => 'admin/generateSuratIzin',
	'uses' => 'AdminController@generateSuratIzin')
	);

Route::post('admin/aturPerizinan', array(
	'as' => 'admin/aturPerizinan',
	'uses' => 'AdminController@aturPerizinan')
	);

Route::post('admin/updatePerizinan', array(
	'as' => 'admin/updatePerizinan',
	'uses' => 'AdminController@updatePerizinan')
	);

//delete permohonan

Route::get('admin/delete_permohonan/{id}', array(
	'as' => 'admin/delete_permohonan',
	'uses'=>'AdminController@deletePermohonan')
	);

Route::get('admin/deletePermohonanWithoutNotif/{id}', array(
	'as' => 'admin/deletePermohonanWithoutNotif',
	'uses'=>'AdminController@deletePermohonanWithoutNotif')
	);

Route::get('delete_permohonan/{id}', array(
	'as' => 'delete_permohonan',
	'uses' => 'PermohonanController@deletePermohonan')
	);

//delete perizinan
Route::get('admin/delete_perizinan/{id}', array(
	'as' => 'admin/delete_perizinan',
	'uses' => 'AdminController@deletePerizinan')
	);
Route::get('delete_perizinan/{id}', array(
	'as' => 'delete_perizinan',
	'uses' => 'PermohonanController@deletePerizinan')
	);

Route::get('loginsso', array(
	'as' => 'loginsso',
	'uses' => 'SSOController@loginsso')
	);

Route::get('logoutsso', array(
	'as' => 'logoutsso',
	'uses' => 'SSOController@logoutsso')
	);

//api
Route::get('api/daftarterminal', array(
	'as' => 'api/daftarterminal',
	'uses' => 'ApiController@getDaftarTerminal')
	);