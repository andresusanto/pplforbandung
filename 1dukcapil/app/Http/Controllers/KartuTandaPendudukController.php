<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Carbon\Carbon;

use App\Penduduk;
use App\AktaKelahiran;
use App\KartuTandaPenduduk;
use App\User;
use Hash;


class KartuTandaPendudukController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex() {
		$data = array(); 
		if (Request::has('s')) {
			$ktp = KartuTandaPenduduk::find(Request::input('s'));
			$data['ktp'] = 'id';
			if ($ktp != NULL) {
				$data['ktp'] = $ktp;
				$penduduk = Penduduk::find($ktp->idPenduduk);
				$data['penduduk'] = $penduduk;
			}
		}
        return view('admin.kartu_tanda_penduduk', $data);
	}

	public function getBuat() {
		return view('admin.buat_kartu_tanda_penduduk');
	}

	private function generateRandomString($length = 16) {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function postBuat() {
		$aktaLahir = AktaKelahiran::find(Request::input('nomorAktaLahir'));

		// create KTP instance
		$id = $this->generateRandomString();
		
		$ktp = new KartuTandaPenduduk();
		$ktp->id = $id;
		$ktp->waktuCetak = $ktp->waktuBerlaku = Carbon::now()->addYears(5);
		$ktp->idPenduduk = $aktaLahir->idPenduduk;
		$ktp->save();

		// update penduduk instance
		$penduduk = Penduduk::find($aktaLahir->idPenduduk);
		// $penduduk->nama = Request::input('nama');
		// $penduduk->jenisKelamin = Request::input('jenisKelamin');
		// $penduduk->golonganDarah = Request::input('golonganDarah');
		// $penduduk->tempatLahir = Request::input('tempatLahir');

		// changing birth date only
		// $database = Carbon::createFromFormat('Y-m-d H:i:s', $penduduk->waktuLahir);
		// $now = Carbon::createFromFormat('Y-m-d', Request::input('tanggalLahir'));
		// $database->setDate($now->year, $now->month, $now->day);

		// $penduduk->waktuLahir = $database->toDateTimeString();
		// $penduduk->pekerjaan = Request::input('pekerjaan');
		// $penduduk->statusPernikahan = Request::input('statusPernikahan');
		// $penduduk->kewarganegaraan = Request::input('kewarnegaraan');
		$penduduk->save();

		$user = new User();
		$user->email = $id;
		$password = $this->generateRandomString(6);
		$user->password = Hash::make($password);
		$user->save();

		return redirect('kartutandapenduduk?s='.$id)->with('password', $password);
	}
}