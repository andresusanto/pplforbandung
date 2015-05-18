<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\permintaanWP;
use App\PendaftarWP;
use App\PetugasPajak;
use App\WajibPajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PetugasPajakController extends Controller {

    public function index(){
        return view('petugas.home');
    }

    public function pendaftar(){
        $pendaftars = PendaftarWP::all();
        return view('petugas.pendaftar', compact('pendaftars'));
    }

    public function setuju($id){
        $pendaftar = PendaftarWP::find($id);
        $pendaftar->status_pendaftaran = 1;
        $wp = new WajibPajak;
        $wp->nik = $pendaftar->nik;
        $wp->nama = $pendaftar->nama;
        $wp->npwpd = $pendaftar->nik;
        $wp->alamat = $pendaftar->alamat;
        $wp->tempat_lahir = $pendaftar->tempat_lahir;
        $wp->tanggal_lahir = $pendaftar->tanggal_lahir;
        $wp->save();
        $pendaftar->save();
        return redirect('/petugas/pendaftar');
    }

    public function tolak($id){
        $pendaftar = PendaftarWP::find($id);
        $pendaftar->status_pendaftaran = 0;
        $pendaftar->save();
        return redirect('/petugas/pendaftar');
    }

    public function permintaan(){
        $permintaans = permintaanWP::all();
        return view('petugas.permintaan',compact('permintaans'));
    }

    public function edit(){
        $petugass = PetugasPajak::all();
        return view('petugas.edit',compact('petugass'));
    }

    public function ubah($id){
        $petugas = PetugasPajak::find($id);

        return view('petugas.ubah',compact('petugas'));
    }

    public function submitubah($id){
        $petugas = PetugasPajak::find($id);
        $petugas->username = Input::get('username');
        $petugas->password = Input::get('password');
        $petugas->save();
        return redirect('/petugas/edit');
    }

    public function hapus($id){
        PetugasPajak::destroy($id);
        return redirect('/petugas/edit');
    }

    public function tambah(){
        return view('petugas.tambah');
    }

    public function submittambah(){
        $petugas = new PetugasPajak;
        $petugas->username = Input::get('username');
        $petugas->password = Input::get('password');
        $petugas->save();
        return redirect('/petugas/edit');
    }

    public function wajib_pajak(){
        $wps = WajibPajak::all();
        return view('petugas.wajib_pajak',compact('wps'));
    }

    public function logout(){
        return redirect('/petugas');
    }
    public function cek()
    {
        $petugas = PetugasPajak::where('username', '=', Input::get('username'))->where('password', '=', Input::get('password'))->get();
        if (count($petugas)) {
            return redirect('/petugas/home');
        } else {
            return redirect('/petugas');
        }
    }
    public function pembuatanSTPD()
    {
        $pdf = \PDF::loadView('STPD.templateSTPD')->setPaper('a4')->setOrientation('vertical')->setWarnings(false);
        return $pdf->download('STPD.pdf'); //this code is used for the name pdf
    }
}
