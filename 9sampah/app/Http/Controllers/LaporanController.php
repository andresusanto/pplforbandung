<?php 
namespace App\Http\Controllers;
use Request;
use DB;

	class LaporanController extends Controller {
		public function __construct()
		{
			$this->middleware('login', ['except' => ['index']]);
		}
		public function createLaporan(){
			return view('laporan');
		}
	}
?>