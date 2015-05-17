<?php 
namespace App\Classes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;

use Cookie;
use Redirect;

class SSOData {
	
	//static $CLIENT_ID = "dAU2kooElemk8k6O";
	//static $CLIENT_SECRET = "tY1Tp86GAe1mZIUE";
	//static $REDIRECT_URI = "http://localhost:8888/test/getacctoken/";
	static $CLIENT_ID = "x20Kgnbnmy1LShrJ";
	static $CLIENT_SECRET = "2GmGlXS85RcBNZXk";
	static $REDIRECT_URI = "http://localhost:8080/Rumah-Pajak/public/test/getacctoken";
	
	public static function DukcapilGetAccessToken(){
		if (Input::has('code')){
			$token = null;
			while(!$token['access_token']){
				$params=[
					'grant_type'=>'authorization_code',
					'client_id'=>SSOData::$CLIENT_ID,
					'client_secret'=>SSOData::$CLIENT_SECRET,
					'redirect_uri'=>SSOData::$REDIRECT_URI,
					'code'=> Input::get('code')
				];
				$options = array(
					CURLOPT_URL => 'http://dukcapil.pplbandung.biz.tm/oauth/access_token',
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => http_build_query($params),
					CURLOPT_HTTPHEADER => Array("Content-Type: application/x-www-form-urlencoded"),
					CURLOPT_RETURNTRANSFER => 1
				);
				$ch = curl_init();
				curl_setopt_array($ch,$options);
				$resp = curl_exec($ch);
				curl_close($ch);
				$token = json_decode($resp, true);
			}
			Cookie::queue('access_token',$token['access_token']);
			//TODO to page with Login Success
			return Redirect::to('/wp/daftar');
			return response($token['access_token']);
		} else {
			// redirect to dukcapil
			return Redirect::away('http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id='.SSOData::$CLIENT_ID.'&redirect_uri='.SSOData::$REDIRECT_URI.'&response_type=code');
		}
	}
	
	public static function GetToken(){
		if (Request::hasCookie('access_token')){
			$acc_token=Cookie::get('access_token');
		} else {
			$acc_token=SSOData::DukcapilGetAccessToken();
		}
		return $acc_token;
	}
	
	public static function DukcapilGetDataPenduduk($TOKEN){
		$options = array(
			CURLOPT_URL => 'http://dukcapil.pplbandung.biz.tm/api/penduduk/',
			CURLOPT_POST => false,
			CURLOPT_HTTPHEADER => Array("Authorization: Bearer ".$TOKEN),
			CURLOPT_RETURNTRANSFER => 1
		);
		$ch = curl_init();
		curl_setopt_array($ch,$options);
		$resp = curl_exec($ch);
		curl_close($ch);
		//return $resp?$resp:'false';
		$arr = json_decode($resp, true);
		$arr2['NIK'] = $arr['id'];
		$arr2['Nama'] = $arr['nama_penduduk'];
		$arr2['Alamat'] = $arr['alamat_penduduk'];
		$arr2['Tempat Lahir'] = $arr['tempat_lahir'];
		$arr2['Tgl Lahir'] = date('d-m-Y',strtotime($arr['tgl_lahir']));
		return $arr2;
	}
	
	public static function GetDataPenduduk(){	
		//Get Token
		$acc_token=SSOData::GetToken();
		if (get_class($redir = (object) $acc_token) === 'Illuminate\Http\RedirectResponse'){
			return $redir;
		}
		//Get Data
		//retry 10x until get it right
		for ($i=0;$i<10;$i++){
			$arr = SSOData::DukcapilGetDataPenduduk($acc_token);
			if ($arr['NIK'])break;
		}
		//if invalid data, get token
		if (!$arr['NIK']){
			return SSOData::DukcapilGetAccessToken();
		}
		return $arr;
	}
	
	public static function Test(){
		$arr=SSOData::GetDataPenduduk();
		if (get_class($redir = (object) $arr) === 'Illuminate\Http\RedirectResponse'){
			return $redir;
		}
		return 'NIK = '.$arr['NIK'].'<br>'.'Nama = '.$arr['Nama'];
	}
	
	public static function deleteAcc(){
		Cookie::queue('access_token','3',-1);
		return response('delete cookie');
	}
}
/*
Route::get('test/gettoken', 'PajakController@GetToken');
Route::get('test/getacctoken', 'PajakController@DukcapilGetAccessToken');

Route::get('test/getdata', 'PajakController@GetDataPenduduk');

Route::get('test/delete', 'PajakController@deleteAcc');
*/