<?php namespace App\Http\Controllers;

use App\AktaKematian;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KartuTandaPenduduk;
use App\Penduduk;
use Carbon\Carbon;
use Request;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AktaKematianController extends Controller {

    public function getIndex(){
        if (Request::has('s')) {
            $id = Input::get("s");
            return Redirect('aktakematian/lihat/' . $id);
        } else {
            return Redirect('aktakematian/lihat');
        }
    }

    public function getLihat($id = null)
    {
        $data = array();

        $aktaKematian = AktaKematian::find($id);

        $data['id'] = $id;
        $data['aktaKematian'] = $aktaKematian;
        if ($aktaKematian != null) {
            $data['penduduk'] = $aktaKematian->penduduk;
        }

        return view('admin.akta_kematian', $data);
    }

    public function getBuat() {
        return view('admin.buat_akta_kematian');
    }

    public function postBuat() {
        // validasi penduduk
        $ktp = KartuTandaPenduduk::find(Request::input("idPenduduk"));
        if ($ktp == null) {
            return Redirect::back()->withInput(Request::all())->withErrors(['message' => 'Penduduk dengan kode ' . Request::input('idPenduduk') . ' tidak ditemukan.']);
        }
        $penduduk = $ktp->penduduk;
        if ($penduduk == null) {
            return Redirect::back()->withInput(Request::all())->withErrors(['message' => 'Penduduk dengan kode ' . Request::input('idPenduduk') . ' tidak ditemukan.']);
        }

        $aktaKematian = new AktaKematian();
        $aktaKematian->idPenduduk = $penduduk->id;
        $aktaKematian->tempatMati = Request::input("tempatMati");
        $aktaKematian->waktuMati = Request::input("waktuMati");
        $aktaKematian->waktuCetak = Carbon::now();
        $aktaKematian->save();

        return Redirect('aktakematian/lihat/' . $aktaKematian->id);
    }

}