<?php
namespace App\Http\Controllers;

use Response;
use Auth;
use Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

use App\Pengaduan;
use App\User;
use App\IzinAir;


class MasyarakatController extends Controller {


	
	public function getIndex()
	{
		//return view('pengaduan');
	}
	
	public function getFaq(){
		return view('faq')->with(array('nav_faq' => ""));
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

	public function postCari()
	{
		$keyword = Request::input('cari');
		$izinair = IzinAir::where(function($query) use ($keyword)
            {
                $query->where('deskripsi', 'LIKE', "%$keyword%")
                      ->where('status', '<>', 'PENDING APPROVE');
            })->get();
		foreach($izinair as $izin)
		{
			$izin->kategori = $this->idToKategori($izin->kategori);
		}
		return view('cari')->with(array(
												'izinair' => $izinair
												));
	}
}
