<?php
namespace App\Http\Controllers;

use Response;
use Auth;
use Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

use App\Pengaduan;
use App\User;


class PengaduanController extends Controller {


	
	public function getIndex()
	{
		return view('pengaduan');
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

	public function postIndex()
	{
		$pengaduan = new Pengaduan;
		$pengaduan->nama = Request::input('nama');
		$pengaduan->kontak = Request::input('kontak');
		$pengaduan->judul = Request::input('judul');
		$pengaduan->aduan = Request::input('deskripsi');
		$pengaduan->status = "PENDING";
		
		$pengaduan->save();
		
		return view('message')->with(array(
												'message_title' => "Sukses",
												'message_body' => "Pengaduan anda berhasil dikirim",
												'message_color' => "green",
												'message_redirect' => action('WelcomeController@index')
											));
	}
}
