<?php namespace App\Http\Controllers;

use App\AktaNikah;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KartuTandaPenduduk;
use App\Penduduk;
use Carbon\Carbon;
use Request;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AktaNikahController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('admin.akta_nikah');
    }

    public function getBuat()
    {
        return view('admin.buat_akta_nikah');
    }

    public function postSearchaktanikah(){
        $no_akta=Input::get('no-akta');
        if(is_numeric($no_akta)) {
            $akta_nikah = AktaNikah::find($no_akta);
            if(!is_null($akta_nikah)) {
                $id_suami = $akta_nikah->suami;
                $id_istri = $akta_nikah->istri;
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
    public function postBuataktanikah() {
        $akta_nikah = new AktaNikah();
        $akta_nikah->waktuNikah = Input::get('tanggal');
        $akta_nikah->tempatNikah = Input::get('tempat');
        $akta_nikah->waktuCetak = Carbon::now();
        $nik_pria = Input::get('nik-pria');
        $nik_wanita = Input::get('nik-wanita');
        $akta_nikah->created_at = Carbon::now();
        $akta_nikah->updated_at = Carbon::now();
        //DB query exception
        try {
            $akta_nikah->suami = DB::table('kartu_tanda_penduduk')->find($nik_pria)->idPenduduk;
            $akta_nikah->istri = DB::table('kartu_tanda_penduduk')->find($nik_wanita)->idPenduduk;
            if($akta_nikah->save()){
                $penduduk_pria=Penduduk::find($akta_nikah->suami);
                $penduduk_pria->statusPernikahan="Sudah Kawin";
                $penduduk_pria->save();
                $penduduk_wanita=Penduduk::find($akta_nikah->istri);
                $penduduk_wanita->statusPernikahan="Sudah Kawin";
                $penduduk_wanita->save();
                return redirect('/aktanikah/buat');
            }
            else{
                return redirect()->back();
            }
        } catch (ErrorException $e){
            return $e;
        }
    }
    public function postSearchnik(){
        if(Request::ajax()) {
            $nikpria = Input::get('nik_pria');
            $nikwanita = Input::get('nik_wanita');
            //Dapatkan data mempelai pria
            $model_pria = DB::table('kartu_tanda_penduduk')->where('kartu_tanda_penduduk.id',$nikpria)
                ->join('penduduk', 'kartu_tanda_penduduk.idPenduduk', '=', 'penduduk.id')
                ->select('nama', 'jenisKelamin','tempatLahir','waktuLahir')
                ->first();
            if($model_pria!=null) {
                $tgl_lahir_pria = $model_pria->waktuLahir;
                $date = date_create($tgl_lahir_pria);
                $tgl_lahir_pria = date_format($date, 'd-m-Y');
                $model_pria->waktuLahir = $tgl_lahir_pria;
                //Dapatkan Data Mempelai Wanita
            }
            $model_wanita = DB::table('kartu_tanda_penduduk')->where('kartu_tanda_penduduk.id', $nikwanita)
                ->join('penduduk', 'kartu_tanda_penduduk.idPenduduk', '=', 'penduduk.id')
                ->select('nama', 'jenisKelamin', 'tempatLahir', 'waktuLahir')
                ->first();
            if($model_wanita!=null) {
                $tgl_lahir_wanita = $model_wanita->waktuLahir;
                $date = date_create($tgl_lahir_wanita);
                $tgl_lahir_wanita = date_format($date, 'd-m-Y');
                $model_wanita->waktuLahir = $tgl_lahir_wanita;
            }
        }
        return Response::json(array(
            'pria'=>$model_pria,
            'wanita'=>$model_wanita
        ));
    }
}
