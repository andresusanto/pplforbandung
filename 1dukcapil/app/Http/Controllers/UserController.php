<?php namespace App\Http\Controllers;

use App\AktaNikah;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Auth;
use App\KartuTandaPenduduk;
use App\Penduduk;
use App\AnggotaKartuKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() {
        $user = Auth::user();
        $penduduk = Auth::user()->ktp->penduduk;

        // $kartuKeluarga = AnggotaKartuKeluarga::where('idPenduduk', '=', $user->idPenduduk)->firstOrFail();
        // dd($kartuKeluarga);
        return view('penduduk.profil', [
            'penduduk' => $penduduk
        ]);
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::back();
    }
}


