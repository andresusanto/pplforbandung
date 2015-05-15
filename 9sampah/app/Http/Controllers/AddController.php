<?php 
namespace App\Http\Controllers;
use Request;
use DB;
use App\TPA;
use App\TPS;
use App\Sarana;
use App\Petugas;

	class AddController extends Controller {
		public function __construct()
		{
			$this->middleware('login', ['except' => ['index']]);
		}
		public function getAddTPA()
		{
			return view('formAddTPA');
		}
		public function postAddTPA()
		{
			$input = Request::all();
			// return response($input);
			$tpa = new TPA();
			$tpa->fill($input)->save();
			return redirect('inventoryTPA');
		}

		public function getAddTPS()
		{
			return view('formAddTPS');
		}
		public function postAddTPS()
		{
			$input = Request::all();
			// return response($input);
			$tps = new TPS();
			$tps->fill($input)->save();
			return redirect('inventoryTPS');
		}

		public function getAddSarana()
		{
			return view('formAddSarana');
		}
		public function postAddSarana()
		{
			$input = Request::all();
			// return response($input);
			$sarana = new Sarana();
			$sarana->fill($input)->save();
			return redirect('inventorySarana');
		}

		public function getAddPetugas()
		{
			return view('formAddPetugas');
		}
		public function postAddPetugas()
		{
			$nama = Request::get("nama");
			$nip = Request::get("nip");
			$pekerjaan = Request::get("pekerjaan");
			$username = Request::get("username");
			$password = Request::get("password");

			DB::table('petugas')->insert(array(
			    array('nama' => $nama, 'nip' => $nip, 'pekerjaan' => $pekerjaan, 'username' => $username, 'password' => $password)
			));
			return redirect('inventoryPetugas');
		}
	}
?>