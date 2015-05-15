<?php 
namespace App\Http\Controllers;
use Request;
use DB;
use Session;
use App\tpa;
use App\tps;
use App\sarana;
use App\petugas;

	class UpdController extends Controller {
		public function __construct()
		{
			$this->middleware('login', ['except' => ['index']]);
		}
		public function getUpdTPA($id)
		{
			$tpa = TPA::find($id);
			Session::put('namaTPA',$tpa->nama);
			Session::put('lokasiTPA',$tpa->lokasi);
			Session::put('volumeTPA',$tpa->volume);
			return view('formUpdTPA');
		}
		public function postUpdTPA($id)
		{
			$input = Request::all();
			// return response($input);
			$tpa = TPA::find($id);
			$tpa->fill($input)->save();
			return redirect('inventoryTPA');
		}

		public function getUpdTPS($id)
		{
			$tps = TPS::find($id);
			Session::put('namaTPS',$tps->nama);
			Session::put('lokasiTPS',$tps->lokasi);
			Session::put('volumeTPS',$tps->volume);
			return view('formUpdTPS');
		}
		public function postUpdTPS($id)
		{
			$input = Request::all();
			// return response($input);
			$tps = TPS::find($id);
			$tps->fill($input)->save();
			return redirect('inventoryTPS');
		}

		public function getUpdSarana($id)
		{
			$sarana = Sarana::find($id);
			Session::put('jenisSarana',$sarana->jenis);
			Session::put('platSarana',$sarana->plat);
			return view('formUpdSarana');
		}
		public function postUpdSarana($id)
		{
			$input = Request::all();
			// return response($input);
			$sarana = Sarana::find($id);
			$sarana->fill($input)->save();
			return redirect('inventorySarana');
		}

		public function getUpdPetugas($id)
		{
			$petugas = Petugas::find($id);
			Session::put('namaPetugas',$petugas->nama);
			Session::put('NIP',$petugas->nip);
			Session::put('pekerjaan',$petugas->pekerjaan);
			Session::put('username',$petugas->username);
			Session::put('password',$petugas->password);
			return view('formUpdPetugas');
		}
		public function postUpdPetugas($id)
		{
			$nama = Request::get("nama");
			$nip = Request::get("nip");
			$pekerjaan = Request::get("pekerjaan");
			$username = Request::get("username");
			$password = Request::get("password");

			DB::table('petugas')
				-> where ('id', $id)
				-> update (['nama' => $nama, 'nip' => $nip, 'pekerjaan' => $pekerjaan, 'username' => $username, 'password' => $password]);
			return redirect('inventoryPetugas');
		}
	}
?>