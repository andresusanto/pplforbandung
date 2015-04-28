<?php
namespace App\Http\Controllers;

use Response;
use Auth;
use Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Controller;

use App\IzinAir;
use App\IzinAirTemp;
use App\User;
use App\Pengaduan;


class PerizinanAirController extends Controller {


	public function validasiInput(){
	
	}

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getNewperizinan()
	{
		return view('user/newizin')->with('nav_pengajuan','');
	}
	
	
	public function postNewperizinan()
	{
		$izinair = new IzinAir;
		$izinair->id_penduduk = Auth::user()->id;
		$izinair->id_lahan	= Request::input('lahan');
		$izinair->kategori = Request::input('kategori');
		$izinair->deskripsi = Request::input('deskripsi');
		$izinair->status = "PENDING APPROVE";
		$izinair->ischange = 0;
		$izinair->save();
		
		return view('message')->with(array(
												'message_title' => "Sukses",
												'message_body' => "Perizinan anda berhasil dikirim",
												'message_color' => "green",
												'message_redirect' => action('PerizinanAirController@getListperizinan')
											));
	}
	
	public function getNotifikasiuser()
	{
		
		return view('home');
	}
	
	public function approveizin($id, $status)
	{
		$izinair = IzinAir::find($id);
		if ($izinair){
			if ($status == 1){
				$izinair->status = "APPROVED";
				$izinair->mulai_berlaku = date('Y-m-d');
				$izinair->berlaku_hingga = date('Y-m-d',strtotime(date("Y-m-d") . " + 365 day"));
			}else
				$izinair->status = "REJECTED";
			
			$izinair->save();
			
			return view('message')->with(array(
					'message_title' => "Sukses",
					'message_body' => "Status perizinan sukses diubah",
					'message_color' => "green",
					'message_redirect' => action('PerizinanAirController@getHomedinas')
				));
		}else{
			return view('message')->with(array(
					'message_title' => "Error",
					'message_body' => "Perizinan gagal disetujui",
					'message_color' => "red",
					'message_redirect' => action('PerizinanAirController@getHomedinas')
				));
		}
	}
	
	public function renewizin($id, $status)
	{
		$izinair = IzinAir::find($id);
		$msg = "Permohonan perpanjangan izin berhasil ditolak";
		if ($izinair){
			if ($status == 1){
				$izinair->status = "APPROVED";
				$izinair->mulai_berlaku = date('Y-m-d');
				$izinair->berlaku_hingga = date('Y-m-d',strtotime($izinair->berlaku_hingga . " + 365 day"));
				$msg = "Permohonan perpanjangan izin berhasil diterima";
			}else
				$izinair->status = "APPROVED";
			
			$izinair->save();
			
			return view('message')->with(array(
					'message_title' => "Sukses",
					'message_body' => $msg,
					'message_color' => "green",
					'message_redirect' => action('PerizinanAirController@getListperpanjangan')
				));
		}else{
			return view('message')->with(array(
					'message_title' => "Error",
					'message_body' => "Perizinan gagal diperbaharui",
					'message_color' => "red",
					'message_redirect' => action('PerizinanAirController@getListperpanjangan')
				));
		}
	}
	
	public function ubahizin($id, $status)
	{
		$izinair = IzinAir::find($id);
		if ($izinair){
			$msg = "Permohonan perubahan izin berhasil ditolak";
			if ($status == 1){
				$izinair->status = "APPROVED";
				$izintmp = IzinAirTemp::where('id_original', '=', $izinair->id)->first();
				$izinair->id_lahan = $izintmp->id_lahan;
				$izinair->kategori = $izintmp->kategori;
				$izinair->deskripsi = $izintmp->deskripsi;
				
				$msg = "Permohonan perubahan izin berhasil diterima";
			}else
				$izinair->status = "APPROVED";
			
			$izinair->save();
			
			return view('message')->with(array(
					'message_title' => "Sukses",
					'message_body' => $msg,
					'message_color' => "green",
					'message_redirect' => action('PerizinanAirController@getListperpanjangan')
				));
		}else{
			return view('message')->with(array(
					'message_title' => "Error",
					'message_body' => "Perizinan gagal diperbaharui",
					'message_color' => "red",
					'message_redirect' => action('PerizinanAirController@getListperpanjangan')
				));
		}
	}
	
	public function perpanjangperizinan($id)
	{
		$izinair = IzinAir::find($id);
		if ($izinair->status == 'APPROVED'){
			$izinair->status = "PENDING RENEWAL";
			$izinair->save();
			
			
			return view('message')->with(array(
													'message_title' => "Sukses",
													'message_body' => "Permohonan perpanjangan izin anda berhasil dikirim",
													'message_color' => "green",
													'message_redirect' => action('PerizinanAirController@detailperizinanuser', $id)
												));
		}else{
			return view('message')->with(array(
												'message_title' => "Gagal",
												'message_body' => "Permohonan perpanjangan izin anda gagal dikirim. Izin anda belum di APPROVE oleh Dinas / Sedang dalam proses pengajuan lainnya.",
												'message_color' => "red",
												'message_redirect' => action('PerizinanAirController@detailperizinanuser', $id)
											));
		}
	}
	
	public function markpengaduan($id)
	{
		$pengaduan = Pengaduan::find($id);
		$pengaduan->status = "DONE";
		$pengaduan->save();
			
			
		return view('message')->with(array(
												'message_title' => "Sukses",
												'message_body' => "Pengaduan berhasil diselesaikan",
												'message_color' => "green",
												'message_redirect' => action('PerizinanAirController@getListpengaduan', $id)
											));
	
	}
	
	public function keberatanperizinan($id)
	{
		$izinair = IzinAir::find($id);
		if ($izinair->status == 'REJECTED'){
			$izinair->status = "PENDING RECHECK";
			$izinair->save();
			
			
			return view('message')->with(array(
													'message_title' => "Sukses",
													'message_body' => "Permohonan keberatan izin anda berhasil dikirim",
													'message_color' => "green",
													'message_redirect' => action('PerizinanAirController@detailperizinanuser', $id)
												));
		}else{
			return view('message')->with(array(
												'message_title' => "Gagal",
												'message_body' => "Permohonan keberatan izin anda gagal dikirim. Izin anda belum di REJECT oleh Dinas / Sedang dalam proses pengajuan lainnya.",
												'message_color' => "red",
												'message_redirect' => action('PerizinanAirController@detailperizinanuser', $id)
											));
		}
	}
	
	public function postPerpanjangperizinan()
	{
		return view('home');
	}
	
	public function ubahperizinan($id)
	{
		$izinair = IzinAir::where('id', '=', $id)->first();
		
		return view('user/ubahizin')->with('izinair', $izinair);
	}
	
	public function postUbahperizinan()
	{
		$id = Request::input('id');
		$izinair = IzinAir::find($id);
		$izinair->status = "PENDING EDIT";
		$izinair->save();
		
		$izintmp = new IzinAirTemp;
		$izintmp->id_original = $id;
		$izintmp->id_lahan	= Request::input('lahan');
		$izintmp->kategori = Request::input('kategori');
		$izintmp->deskripsi = Request::input('deskripsi');
		$izintmp->status = "PENDING EDIT";
		$izintmp->save();
		
		return view('message')->with(array(
												'message_title' => "Sukses",
												'message_body' => "Permohonan perubahan izin anda berhasil dikirim",
												'message_color' => "green",
												'message_redirect' => action('PerizinanAirController@getListperizinan')
											));
	}
	
	public function getIndex()
	{
		return view('home');
	}

	public function detailperizinanUser($id){
		$izinair = IzinAir::find($id);
		$pengguna = User::find($izinair->id_penduduk);
		$lahan = 'Jalan Dago Asri No 7';
		
		return view('user/detilizin')->with(array(
												'nama' => $pengguna->name,
												'lahan' => $lahan,
												'izinair' => $izinair,
												'kategori' => $this->idToKategori($izinair->kategori),
												'nav_list' => ""));
	}
	
	private function idToKategori($id){
		switch ($id){
			case 1: return "Ijin Pengelolaan Air Bawah Tanah";
			case 2: return "Ijin Pengambilan Air Permukaan";
			case 3: return "Ijin Pembuangan Air Buangan ke Sumber Air";
			case 4: return "Ijin perubahan Alur, Bentuk, Dimensi, dan Kemiringan Dasar Saluran/Sungai";
			case 5: return "Ijin Pembangunan Lintasan yang Berada di Bawah/Atasnya";
			case 6: return "Ijin Pemanfaatan Bangunan Pengairan dan Lahan pada Daerah Sempadan Saluran Air";
			case 7: return "Ijin Pemanfaatan Lahan Mata Air dan Lahan Pengairan lainnya";
		}
	}
	
	public function detilperizinanDinas($id){
		$izinair = IzinAir::find($id);
		
		return view('detailIzinMasuk')->with('izinair', $izinair);
	}
	
	public function ubahstatus($id, $status){
		return $id . ' ' . $status;
	}
	
	public function getHomedinas()
	{
		$izinair = IzinAir::where('status', '=', 'PENDING APPROVE')->get();
		foreach($izinair as $izin)
		{
			$izin->kategori = $this->idToKategori($izin->kategori);
		}
		return view('dinas/home')->with(array(
												'izinair' => $izinair,
												'dinas' => "",
												'nav_masuk'=> ""));
	}
	
	public function getListperpanjangan()
	{
		$izinair = IzinAir::where('status', '=', 'PENDING RENEWAL')->get();
		foreach($izinair as $izin)
		{
			$izin->kategori = $this->idToKategori($izin->kategori);
		}
		return view('dinas/renew')->with(array(
												'izinair' => $izinair,
												'dinas' => "",
												'nav_renew'=> ""));
	}
	
	public function getListkeberatan()
	{
		$izinair = IzinAir::where('status', '=', 'PENDING RECHECK')->get();
		foreach($izinair as $izin)
		{
			$izin->kategori = $this->idToKategori($izin->kategori);
		}
		return view('dinas/recheck')->with(array(
												'izinair' => $izinair,
												'dinas' => "",
												'nav_keberatan'=> ""));
	}
	
	public function getListperubahan()
	{
		$izinair = IzinAir::where('status', '=', 'PENDING EDIT')->get();
		foreach($izinair as $izin)
		{
			$izintmp = IzinAirTemp::where('id_original', '=', $izin->id)->first();
			$izin->kategori_baru = $this->idToKategori($izintmp->kategori);
			$izin->kategori = $this->idToKategori($izin->kategori);
			
			$izin->lokasi = "Jalan Ir H Juanda No 70, Dago";
			$izin->lokasi_baru = "Jalan Ir H Juanda No 72, Dago";
			
			$izin->deskripsi_baru = $izintmp->deskripsi;
		}
		
		return view('dinas/ubah')->with(array(
												'izinair' => $izinair,
												'dinas' => "",
												'nav_ubah'=> ""));
	}
	
	public function getListperizinan()
	{
		$izinair = IzinAir::all();
		
		foreach($izinair as $izin)
		{
			$izin->kategori = $this->idToKategori($izin->kategori);
		}
		return view('user/listizin')->with(array(
												'izinair' => $izinair,
												'nav_list' => "")
											);
	}
	
	public function getListpengaduan()
	{
		$pengaduan = Pengaduan::where('status', '=', 'PENDING')->get();
		
		
		return view('dinas/pengaduan')->with(array(
												'pengaduans' => $pengaduan,
												'dinas' => "",
												'nav_pengaduan' => "")
											);
	}
	
	
	public function getHomeuser()
	{
		return view('public/welcome')->with('nav_home','AS');
	}
	
	public function getShowPerizinanMasuk()
	{
		$izinair = IzinAir::where('status', '=', 'PENDING APPROVE')->get();
		
		return view('IzinMasuk')->with('izinair', $izinair);
		
		/*$izinair = IzinAir::find(2);
		$izinair->deskripsi = 'henry';
		$izinair->save();*/
	}
	
	public function getShowPerizinanDiterima()
	{
		$izinair = IzinAir::where('status', '=', 'ACCEPT')->get();
		
		return view('IzinDiterima')->with('izinair', $izinair);
	}
}
