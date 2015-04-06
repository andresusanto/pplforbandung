<?php
namespace App\Http\Controllers;

use Response;
use Auth;
use Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Controller;

use App\IzinAir;


class PerizinanAirController extends Controller {


	public function validasiInput(){
	
	}

	public function __construct()
	{
		//$this->middleware('auth');
	}
	
	public function getNewperizinan()
	{
		return view('izinbaru');
	}
	
	
	public function postNewperizinan()
	{
		$izinair = new IzinAir;
		$izinair->id_penduduk = "12345"; //seharusnya Auth::user()->nik
		$izinair->id_lahan	= Request::input('lahan');
		$izinair->kategori = Request::input('kategori');
		$izinair->deskripsi = Request::input('deskripsi');
		$izinair->status = "NEW";
		$izinair->ischange = 0;
		$izinair->save();
		
		return view('message')->with(array(
												'message_title' => "Sukses",
												'message_body' => "Perizinan anda berhasil dikirim",
												'message_color' => "green",
												'message_redirect' => action('PerizinanAirController@getIndex')
											));
	}
	
	public function perpanjangperizinan($id)
	{
		return view('home');
	}
	
	public function postPerpanjangperizinan()
	{
		return view('home');
	}
	
	public function ubahperizinan($id)
	{
		return view('home');
	}
	
	public function postUbahperizinan()
	{
		return view('home');
	}
	
	
	public function getIndex()
	{
		return view('home');
	}

	public function detilperizinan($id){
		return $id;
	}
	
	public function ubahstatus($id, $status){
		return $id . ' ' . $status;
	}
	
	public function IndexDinas()
	{
		
	}
	
	public function IndexUser()
	{
		
	}
}
