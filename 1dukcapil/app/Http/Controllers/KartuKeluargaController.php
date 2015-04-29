<?php namespace App\Http\Controllers;

use App\AktaKelahiran;
use App\Http\Requests;
use App\KartuKeluarga;
use App\KartuTandaPenduduk;
use App\Penduduk;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Redirect;
use Input;

class KartuKeluargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getIndex(){
        if (Request::has('s')) {
            $id = Input::get("s");
            return Redirect('kartukeluarga/lihat/' . $id);
        } else {
            return Redirect('kartukeluarga/lihat');
        }
    }

    public function getLihat($id = null)
    {
        $data = array();

        $kartuKeluarga = KartuKeluarga::find($id);
        $data['id'] = $id;
        $data['kartuKeluarga'] = $kartuKeluarga;

        if ($kartuKeluarga != NULL) {
            $data['kepalaKeluarga'] = Penduduk::find($kartuKeluarga->kepalaKeluarga);
            $data['anggotaKeluarga'] = $kartuKeluarga->penduduk;
        }

        return view('admin.kartu_keluarga', $data);
    }

    public function getBuat()
    {
        return view('admin.buat_kartu_keluarga');
    }

    public function postBuat()
    {
        // create a new instance of KartuKeluarga
        $kartuKeluarga = new KartuKeluarga();
        $ktpKepalaKeluarga = KartuTandaPenduduk::find(Request::input('kepalaKeluarga'));
        if ($ktpKepalaKeluarga == null) {
            return Redirect::back()->withInput(Request::all())->withErrors(['message' => 'Penduduk dengan kode ' . Request::input('kepalaKeluarga') . ' tidak ditemukan.']);
        }
        $kepalaKeluarga = $ktpKepalaKeluarga->penduduk;
        if ($kepalaKeluarga == null) {
            return Redirect::back()->withInput(Request::all())->withErrors(['message' => 'Penduduk dengan kode ' . Request::input('kepalaKeluarga') . ' tidak ditemukan.']);
        }

        $kartuKeluarga->kepalaKeluarga = $kepalaKeluarga->id;
        $kartuKeluarga->kodepos = Request::input('kodepos');
        $kartuKeluarga->alamat = Request::input('alamat');
        $kartuKeluarga->provinsi = Request::input('provinsi');
        $kartuKeluarga->kota = Request::input('kota');
        $kartuKeluarga->kecamatan = Request::input('kecamatan');
        $kartuKeluarga->kelurahan = Request::input('kelurahan');
        $kartuKeluarga->status = true;
        $kartuKeluarga->waktuCetak = Carbon::now();
        $kartuKeluarga->generateId();
        $kartuKeluarga->save();

        $n = count(Request::input('nama'));
        for ($i = 0; $i < $n; ++$i) {
            $aktaKelahiran = AktaKelahiran::find(Request::input('kodeAktaLahir')[$i]);
            if ($aktaKelahiran == null) {
                return Redirect::back()->withInput(Request::all())->withErrors(['message' => 'Akta Lahir dengan kode ' . Request::input('kodeAktaLahir')[$i] . ' tidak ditemukan.']);
            }
            $penduduk = AktaKelahiran::find(Request::input('kodeAktaLahir')[$i])->penduduk;
            // $penduduk->jenisKelamin = Request::input('jenisKelamin')[$i];
            $penduduk->golonganDarah = Request::input('golonganDarah')[$i];
            $penduduk->pendidikan = Request::input('pendidikan')[$i];
            $penduduk->pekerjaan = Request::input('pekerjaan')[$i];
            $penduduk->save();

            // create relationships
            $penduduk->kartuKeluarga()->attach($kartuKeluarga->id, ['status' => Request::input('status')[$i]]);
        }

        return Redirect('kartukeluarga/lihat/' . $kartuKeluarga->id);
    }

    public function getTest($id)
    {
        dd($id);
    }
}
