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
Route::get('/', ['uses'=>'LoginController@login','as'=>'login']);
Route::get('/Form_Login',['uses'=>'LoginController@login_admin','as'=>'login_admin_1']);
Route::get('/Admin',['uses'=>'LoginController@login_admin_1','as'=>'login_admin']);

Route::get('izin/logout',['uses'=>'LoginController@logout','as'=>'logout']);
Route::get('izin/logout_admin',['uses'=>'LoginController@logout_admin','as'=>'logout_admin']);

Route::get('home', 'HomeController@index');

/* User Routing */
Route::get('izin', ['uses'=>'IzinController@user','as'=>'userhome']);
Route::get('izin/IzinTempatPenjualanMinumanBeralkohol', 'IzinTempatPenjualanMinumanBeralkoholController@user');
Route::get('izin/IzinUsahaPasarTradisional', 'IzinUsahaPasarTradisionalController@user');
Route::get('izin/IzinUsahaPusatPerbelanjaan', 'IzinUsahaPusatPerbelanjaanController@user');
Route::get('izin/IzinUsahaTokoModern', 'IzinUsahaTokoModernController@user');
Route::get('izin/TandaPendaftaranWaralaba', 'TandaPendaftaranWaralabaController@user');

/* Admin Routing */
Route::get('Admin/izin', ['uses'=>'IzinController@admin', 'as'=>'adminhome']);
Route::get('Admin/izin/IzinTempatPenjualanMinumanBeralkohol', ['uses'=>'IzinTempatPenjualanMinumanBeralkoholController@admin','as'=>'ITPMB']);
Route::get('Admin/izin/IzinUsahaPasarTradisional', ['uses'=>'IzinUsahaPasarTradisionalController@admin','as'=>'IUPT']);
Route::get('Admin/izin/IzinUsahaPusatPerbelanjaan', ['uses'=>'IzinUsahaPusatPerbelanjaanController@admin','as'=>'IUPP']);
Route::get('Admin/izin/IzinUsahaTokoModern', ['uses'=>'IzinUsahaTokoModernController@admin','as'=>'IUTM']);
Route::get('Admin/izin/TandaPendaftaranWaralaba', ['uses'=>'TandaPendaftaranWaralabaController@admin','as'=>'STPW']);

/* Admin: Update Status */
Route::get('Admin/izin/IzinTempatPenjualanMinumanBeralkohol/{id}/status/{status}', 'IzinTempatPenjualanMinumanBeralkoholController@updateStatus');
Route::get('Admin/izin/IzinUsahaPasarTradisional/{id}/status/{status}', 'IzinUsahaPasarTradisionalController@updateStatus');
Route::get('Admin/izin/IzinUsahaPusatPerbelanjaan/{id}/status/{status}', 'IzinUsahaPusatPerbelanjaanController@updateStatus');
Route::get('Admin/izin/IzinUsahaTokoModern/{id}/status/{status}', 'IzinUsahaTokoModernController@updateStatus');
Route::get('Admin/izin/TandaPendaftaranWaralaba/{id}/status/{status}', 'TandaPendaftaranWaralabaController@updateStatus');

/* User: Storing File */
Route::post('izin/IzinUsahaPusatPerbelanjaan/store','IzinUsahaPusatPerbelanjaanController@store');
Route::post('izin/IzinTempatPenjualanMinumanBeralkohol/store','IzinTempatPenjualanMinumanBeralkoholController@store');
Route::post('izin/IzinUsahaTokoModern/store','IzinUsahaTokoModernController@store');
Route::post('izin/IzinUsahaPasarTradisional/store','IzinUsahaPasarTradisionalController@store');
Route::post('izin/IzinTandaPendaftaranWaralaba/store','TandaPendaftaranWaralabaController@store');

/* Admin: Download File */
Route::get('Admin/izin/IzinUsahaPusatPerbelanjaan/{id}/Download', 'IzinUsahaPusatPerbelanjaanController@downloadFile');
Route::get('Admin/izin/IzinTempatPenjualanMinumanBeralkohol/{id}/Download', 'IzinTempatPenjualanMinumanBeralkoholController@downloadFile');
Route::get('Admin/izin/IzinUsahaTokoModern/{id}/Download', 'IzinUsahaTokoModernController@downloadFile');
Route::get('Admin/izin/IzinUsahaPasarTradisional/{id}/Download', 'IzinUsahaPasarTradisionalController@downloadFile');
Route::get('Admin/izin/TandaPendaftaranWaralaba/{id}/Download', 'TandaPendaftaranWaralabaController@downloadFile');
Route::get('Download/{filename}',['uses'=>'IzinController@download','as'=>'downloadfile']);

/* Admin: Delete Izin */
Route::get('Admin/izin/delete/{id}/{jenisizin}',['uses'=>'IzinController@deleteIzin', 'as'=>'deleteIzin']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/* Buat Surat Tanda Izin PDF */
Route::get('suratizin', 'SuratIzinController@index');
Route::get('sendmail', 'SendMailController@sendMail');
Route::get('linkizin', 'SendMailController@getLink');

/* Single Sign On */
Route::get('/login_callback',['uses'=>'LoginController@call_back','as'=>'login_callback']);
Route::get('/login_callback_admin',['uses'=>'LoginController@call_back_admin','as'=>'login_callback_admin']);
Route::get('/login_callback_admin1',['uses'=>'LoginController@call_back_admin1','as'=>'login_callback_admin1']);

/* Test ZIP */
Route::get('/zip/{files}',['uses'=>'ZipController@downloadZip','as'=>'downloadZip']);