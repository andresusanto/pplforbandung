<?php namespace App\Http\Controllers;

use App\AktaKelahiran;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penduduk;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Request;

class AktaKelahiranController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex() {
        $data = array();
        if (Request::has('s')) {
            $id = Input::get("s");
            $aktalahir = AktaKelahiran::find($id);
            $data['aktalahir'] = $aktalahir;
            if ($aktalahir != NULL) {
                $penduduk = Penduduk::find($aktalahir->idPenduduk);
                $data['penduduk'] = $penduduk;
            }
        }
        return view("admin.akta_kelahiran", $data);
	}

    public function getBuat() {
        return view('admin.buat_akta_kelahiran');
    }

    /**
     *
     */
    public function postBuat() {
        $penduduk = new Penduduk();
        $penduduk->nama = Input::get("nama");
        $penduduk->kewarganegaraan = "wni";
        $penduduk->jenisKelamin = Input::get("jenisKelamin");
        $penduduk->tempatLahir = Input::get("tempatLahir");
        $penduduk->waktuLahir = Carbon::parse(Input::get("tanggalLahir")." ".Input::get("jamLahir"));
        if ($penduduk->save()) {
            $aktalahir = new AktaKelahiran();
            $aktalahir->idPenduduk = $penduduk->id;
            $aktalahir->waktuCetak = Carbon::now();
            if ($aktalahir->save()) {
                return redirect('aktakelahiran?s='.$aktalahir->id);
            }
        }
        return redirect()->back();
    }
}