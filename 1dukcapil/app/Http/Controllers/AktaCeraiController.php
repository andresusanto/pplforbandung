<?php namespace App\Http\Controllers;

use App\AktaCerai;
use App\AktaNikah;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KartuTandaPenduduk;
use App\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AktaCeraiController extends Controller {


    public function getBuat() {
        return view('admin.buat_akta_cerai');
    }

    public function getIndex(){
        return view('admin.akta_cerai');
    }

    public function postSearchaktacerai(){
        $no_akta=Input::get('no-akta');
        if(is_numeric($no_akta)) {
            $akta_cerai = AktaCerai::find($no_akta);
            if(!is_null($akta_cerai)) {
                $id_suami = $akta_cerai->suami;
                $id_istri = $akta_cerai->istri;
                $suami = Penduduk::find($id_suami);
                $istri = Penduduk::find($id_istri);
                return view('admin.akta_nikah', compact('no_akta', 'suami', 'istri'));
            }else{
                return view('admin.akta_nikah');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function postBuataktacerai() {
        try {
            $nik_pria = Input::get('nik-pria');
            $nik_wanita = Input::get('nik-wanita');
            $no_akta_nikah = Input::get('no-akta-nikah');

            $akta_nikah = AktaNikah::find($no_akta_nikah);
            $nik_suami = DB::table('kartu_tanda_penduduk')->where('idPenduduk', $akta_nikah->suami)->first();
            $nik_istri = DB::table('kartu_tanda_penduduk')->where('idPenduduk', $akta_nikah->istri)->first();


            if ($nik_suami->id == $nik_pria && $nik_istri->id == $nik_wanita) {
                $akta_cerai = new AktaCerai();
                $akta_cerai->waktuCerai = Input::get('tanggal-cerai');;
                $akta_cerai->waktuCetak = Carbon::now();
                $akta_cerai->suami = $akta_nikah->suami;
                $akta_cerai->istri = $akta_nikah->istri;
                $akta_cerai->keadaanIstri = Input::get('keadaan-istri');
                $akta_cerai->created_at = Carbon::now();;
                $akta_cerai->updated_at = Carbon::now();;
                if ($akta_cerai->save()) {
                    $suami = Penduduk::find($akta_nikah->suami);
                    $suami->statusPernikahan = "Cerai";
                    $suami->save();
                    $istri = Penduduk::find($akta_nikah->istri);
                    $istri->statusPernikahan = "Cerai";
                    $istri->save();
                    $no_akta = $akta_cerai->id;
                    return view('admin.akta_cerai', compact('no_akta', 'suami', 'istri'));
                } else {
                    echo 'a';
                    // return view('admin.buat_akta_cerai');
                }
            } else {
                    echo 'b';
                // return view('admin.buat_akta_cerai');
            }
        }catch (\Exception $e){

                    echo 'c';
            // return view('admin.buat_akta_cerai');
        }
    }
}


