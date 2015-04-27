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
		$this->middleware('auth');
	}
	
	public function getNewperizinan()
	{
		return view('formperizinanbaru');
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
												'message_redirect' => action('PerizinanAirController@homeuser')
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
		$izinair = IzinAir::where('id', '=', $id)->first();
		$data = $izinair->toArray();
		
		return view('formperubahanizin', $data);
	}
	
	public function postUbahperizinan()
	{
		$id = Request::input('id');
		$izinair = IzinAir::find($id);
		$izinair->deskripsi = Request::input('deskripsi');
		$izinair->save();
		return view('homeuser');
	}
	
	public function getIndex()
	{
		return view('home');
	}

	public function detailperizinanUser($id){
		$izinair = IzinAir::find($id);
		return view('detailperizinan')->with('izinair', $izinair);
	}
	
	public function detilperizinanDinas($id){
		$izinair = IzinAir::find($id);
		
		return view('detailizinmasuk')->with('izinair', $izinair);
	}
	
	public function ubahstatus($id, $status){
		return $id . ' ' . $status;
	}
	
	public function getHomedinas()
	{
		return view('homepagedinas');
	}
	
	public function getHomeuser()
	{
		$izinair = IzinAir::all();
		
		return view('homepageuser')->with('izinair', $izinair);
	}
	
	public function getShowPerizinanMasuk()
	{
		$izinair = IzinAir::where('status', '=', 'NEW')->get();
		
		return view('izinmasuk')->with('izinair', $izinair);
		
		/*$izinair = IzinAir::find(2);
		$izinair->deskripsi = 'henry';
		$izinair->save();*/
	}
	
	public function getShowPerizinanDiterima()
	{
		$izinair = IzinAir::where('status', '=', 'ACCEPT')->get();
		
		return view('izinditerima')->with('izinair', $izinair);
	}
}
