<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Permohonan;
use App\Perizinan;
use Request;
use Carbon\Carbon;
use Response;

class PermohonanController extends Controller {

    public function index(){
        return view ('permohonan.home');
    }

	public function form() {
        return view('permohonan.form_permohonan');
    }

    public function get() {
        try{
            $user = Session::get('user');
        } catch (Exception $e) {
            return Redirect::route('home');
        }

        $permohonans = Permohonan::where('id_pemohon', $user->id)->get();

        return view('permohonan.daftar_permohonan', compact('permohonans'));
    }

    public function entry() {
        $input = Request::all();

        $input['updated_at'] = Carbon::now();
        $input['created_at'] = Carbon::now();
        $input['status_permohonan'] = "Menunggu Validasi";

        $oldInput = [
                'id_pemohon' => $input['id_pemohon'],
                'email_pemohon' => $input['email_pemohon'],
                'id_surat_tanah' => $input['id_surat_tanah'],
                'jenis_pemohon' => $input['jenis_pemohon'],
                'jenis_permohonan' => $input['jenis_permohonan'],
                'lokasi_tanah' => $input['lokasi_tanah'],
                'tanggal_dibuat' => $input['tanggal_dibuat'],
                'tanggal_expired' => $input['tanggal_expired'],
            ];

        $validator = array('lampiran' => 'File harus berbentuk PDF');

        if(Request::file('lampiran')->getClientOriginalExtension() != "pdf"){
            return Redirect::back()->with('oldInput', $oldInput)->withErrors($validator);
        }

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
            Mail::send('permohonan.notifikasi_enroll', $data, function($message) use ($permohonan)
            {
                $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                $message->to($permohonan['email_pemohon'])->subject('Enrollment key parkir dan terminal');
            });
        } catch (Exception $e) {
            return Redirect::route('home');
        }

        $filename = $input['key'].'-IMB.'.Request::file('lampiran')->getClientOriginalExtension();

        Request::file('lampiran')->move('./storage/'.$input['id_pemohon'].'/', $filename);

        $path = public_path();

        $input['lampiran'] = $filename;

        $db = Permohonan::create($input);

        return Redirect::route('daftar_permohonan');
    }

    public function update(){
        $input = Request::all();
        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        $validator = array('enroll' => 'Terjadi Error: File lampiran harus berbentuk PDF');

        if(Request::file('lampiran') != null){

            if(Request::file('lampiran')->getClientOriginalExtension() != "pdf"){
                return Redirect::back()->with('permohonan', $permohonan)->withErrors($validator);
            }

            $filename = $permohonan->key.'-IMB.'.Request::file('lampiran')->getClientOriginalExtension();

            Request::file('lampiran')->move('./storage/'.$input['id_pemohon'].'/', $filename);
        }

        if($permohonan->email_pemohon != $input['email_pemohon']){
            $_permohonan = [
                'id_pemohon' => $input['id_pemohon'],
                'email_pemohon' => $input['email_pemohon'],
                'id_surat_tanah' => $input['id_surat_tanah'],
                'jenis_pemohon' => $input['jenis_pemohon'],
                'jenis_permohonan' => $input['jenis_permohonan'],
                'lokasi_tanah' => $input['lokasi_tanah'],
                'tanggal_dibuat' => $input['tanggal_dibuat'],
                'tanggal_expired' => $input['tanggal_expired'],
                'key' => $permohonan->key
            ];

            $data = [
                    'permohonan' => $_permohonan
                ];

            try {
                Mail::send('permohonan.notifikasi_enroll', $data, function($message) use ($_permohonan)
                {
                    $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                    $message->to($_permohonan['email_pemohon'])->subject('Enrollment key parkir dan terminal');
                });
            } catch (Exception $e) {
                return Redirect::route('home');
            }

            $permohonan->email_pemohon = $input['email_pemohon'];
        }
        $permohonan->jenis_pemohon = $input['jenis_pemohon'];
        $permohonan->tanggal_dibuat = $input['tanggal_dibuat'];
        $permohonan->tanggal_expired = $input['tanggal_expired'];

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

        $_permohonan = [
                'id_pemohon' => $permohonan->id_pemohon,
                'email_pemohon' => $permohonan->email_pemohon,
                'id_surat_tanah' => $permohonan->id_surat_tanah,
                'jenis_pemohon' => $permohonan->jenis_pemohon,
                'jenis_permohonan' => $permohonan->jenis_permohonan,
                'lokasi_tanah' => $permohonan->lokasi_tanah,
                'tanggal_dibuat' => $permohonan->tanggal_dibuat,
                'tanggal_expired' => $permohonan->tanggal_expired,
                'key' => $permohonan->key
            ];

        $data = [
                'permohonan' => $_permohonan
            ];

        try {
            Mail::send('permohonan.notifikasi_delete', $data, function($message) use ($_permohonan)
            {
                $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                $message->to($_permohonan['email_pemohon'])->subject('Penghapusan permohonan terkait parkir dan terminal');
            });
        } catch (Exception $e) {
            return Redirect::route('daftar_permohonan');
        }

        $permohonan->delete();

        return Redirect::route('daftar_permohonan'); 
    }

    public function bayarRetribusi(){
        $input = Request::all();

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        return view('permohonan.enroll_bayar_retribusi', compact('permohonan'));
    }

    public function updateBayarRetribusi(){
        $input = Request::all();
        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        $validator = array('enroll' => 'Terjadi Error: File bukti pembayaran harus berbentuk JPG/JPEG');

        if(Request::file('bukti_pembayaran') != null){

            if(Request::file('bukti_pembayaran')->getClientOriginalExtension() != "jpg"){
                return Redirect::back()->with('permohonan', $permohonan)->withErrors($validator);
            }

            $filename = $permohonan->key.'-BuktiPembayaran.'.Request::file('bukti_pembayaran')->getClientOriginalExtension();

            Request::file('bukti_pembayaran')->move('./storage/'.$permohonan->id_pemohon.'/', $filename);
        }
        $_permohonan = [
            'id_pemohon' => $permohonan->id_pemohon,
            'email_pemohon' => $permohonan->email_pemohon,
            'id_surat_tanah' => $permohonan->id_surat_tanah,
            'jenis_pemohon' => $permohonan->jenis_pemohon,
            'jenis_permohonan' => $permohonan->jenis_permohonan,
            'lokasi_tanah' => $permohonan->lokasi_tanah,
            'tanggal_dibuat' => $permohonan->tanggal_dibuat,
            'tanggal_expired' => $permohonan->tanggal_expired,
            'key' => $permohonan->key
        ];

        $data = [
                'permohonan' => $_permohonan
            ];

        try {
            Mail::send('permohonan.notifikasi_bukti_pembayaran', $data, function($message) use ($_permohonan)
            {
                $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                $message->to($_permohonan['email_pemohon'])->subject('Bukti pembayaran permohonan izin parkir dan terminal');
            });
        } catch (Exception $e) {
            return Redirect::route('home');
        }

        $permohonan->bukti_pembayaran = $filename;
        
        $permohonan->save();

        return Redirect::route('daftar_permohonan');
    }

    public function getDaftarIzin(){
        try{
            $user = Session::get('user');
        } catch (Exception $e) {
            return Redirect::route('home');
        }

        $perizinans = Perizinan::where('id_pemohon', $user->id)->get();

        return view('permohonan.daftar_izin', compact('perizinans'));
    }
}
