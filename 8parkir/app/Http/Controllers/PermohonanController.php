<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Permohonan;
use Request;
use Carbon\Carbon;

class PermohonanController extends Controller {

    public function index(){
        return view ('home');
    }

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

        $permohonan = [
                'id_pemohon' => $input['id_pemohon'],
                'email_pemohon' => $input['email_pemohon'],
                'id_surat_tanah' => $input['id_surat_tanah'],
                'jenis_pemohon' => $input['jenis_pemohon'],
                'jenis_permohonan' => $input['jenis_permohonan'],
                'lokasi_tanah' => $input['lokasi_tanah'],
                'tanggal_dibuat' => $input['tanggal_dibuat'],
                'tanggal_expired' => $input['tanggal_expired'],
                'key' => $input['key']
            ];

        $data = [
                'permohonan' => $permohonan
            ];

        try {
            Mail::send('permohonan.notifikasi', $data, function($message) use ($permohonan)
            {
                $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                $message->to($permohonan['email_pemohon'])->subject('Enrollment key parkir dan terminal');
            });
        } catch (Exception $e) {
            return Redirect::route('daftar_permohonan');
        }

        $db = Permohonan::create($input);

        $filename = Request::file('lampiran')->getClientOriginalName();

        Request::file('lampiran')->move('./storage/', $filename);

        return Redirect::route('daftar_permohonan');
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

        return Redirect::route('daftar_permohonan');
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

    public function enrollPermohonanBayarRetribusi(){
        $input = Request::all();

        $validator = array('enroll' => 'enrollment key salah');

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        if($permohonan->key == $input['key']){
            return view('permohonan.bayar_retribusi', compact('permohonan'));
        }

        return Redirect::to('enrollPermohonanBayarRetribusi')->with('permohonan', $permohonan)->withErrors($validator);
    }

    public function getEnrollPermohonanBayarRetribusi(){
        $session = Session::get('permohonan');
        $permohonan = Permohonan::where('id', '=', $session->id)->firstOrFail();

        return view('permohonan.enroll_bayar_retribusi', compact('permohonan'));
    }

    

    public function deletePermohonan($id){
        $permohonan = Permohonan::where('id', '=', $id)->firstOrFail();

        $permohonan->delete();

        return Redirect::route('daftar_permohonan'); 
    }

    public function bayarRetribusi(){
        $input = Request::all();

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        return view('permohonan.enroll_bayar_retribusi', compact('permohonan'));
    }

    public function updateBayarRetribusi(){
        return Redirect::route('daftar_permohonan');
    }
}
