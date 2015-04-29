<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Permohonan;
use Request;
use Carbon\Carbon;

class PermohonanController extends Controller {

	public function form() {

        return view('permohonan.form_permohonan');
    }

    public function get() {
        $permohonans = Permohonan::all();

        return view('permohonan.daftar_permohonan', compact('permohonans'));
    }

    public function entry() {
        $input = Request::all();

        $input['updated_at'] = Carbon::now();
        $input['created_at'] = Carbon::now();
        $input['status_permohonan'] = Permohonan::menunggu_validasi;

        $db = Permohonan::create($input);

        return redirect('daftar_permohonan');
    }

    public function update(){
        $input = Request::all();
        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        $permohonan->email_pemohon = $input['email_pemohon'];
        $permohonan->jenis_pemohon = $input['jenis_pemohon'];
        $permohonan->tanggal_dibuat = $input['tanggal_dibuat'];
        $permohonan->tanggal_expired = $input['tanggal_expired'];
        $permohonan->lampiran = $input['lampiran'];

        $permohonan->save();

        return redirect('daftar_permohonan');
    }

    public function editPermohonan(){
        $input = Request::all();

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        return view('permohonan.enroll_permohonan', compact('permohonan'));
    }

    public function enrollPermohonan(){
        $input = Request::all();

        $validator = array('enroll' => 'enrollment key salah');

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        if($permohonan->key == $input['key']){
            return view('permohonan.edit_permohonan', compact('permohonan'));
        }

        return Redirect::to('enrollPermohonan')->with('permohonan', $permohonan)->withErrors($validator);
    }

    public function getEnrollPermohonan(){
        $session = Session::get('permohonan');
        $permohonan = Permohonan::where('id', '=', $session->id)->firstOrFail();

        return view('permohonan.enroll_permohonan', compact('permohonan'));
    }

    public function deletePermohonan($id){
        $permohonan = Permohonan::where('id', '=', $id)->firstOrFail();

        $permohonan->delete();

        return redirect('daftar_permohonan'); 
    }

    public function bayarRetribusi(){
        $input = Request::all();

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        return view('permohonan.bayar_retribusi', compact('permohonan'));
    }

    public function updateBayarRetribusi(){
        return redirect('daftar_permohonan');
    }
}
