<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Permohonan;
use App\Admin;
use App\Perizinan;
use Request;
use Mail;
use Carbon\Carbon;
use PDF;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    public function home(){
        if(Session::has('admin')){
            return Redirect::route('admin/home');
        } else {
            return Redirect::route('admin/login');
        }
    }

	public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(){
    	$input = Request::all();
    	$admins = Admin::all();
    	foreach ($admins as $admin) {
    		if($input['email'] == $admin->email && $input['password'] == $admin->password){
                Session::set('admin', $admin);
    			return redirect::to('admin/home');
    		}
    	}

        $validator = array('login' => 'Email atau Password salah!');

    	return redirect::to('admin/login')->withErrors($validator);
    }

    public function getAdmin(){
        if(Session::has('admin')){
            $session = Session::get('admin');
        	$admin = Admin::where('id', '=', $session->id)->firstOrFail();
        	return view('admin.home', compact("admin", $admin));
        } else return redirect::to('admin/login');
    }

    public function getPermohonan(){
        $permohonans = Permohonan::all();
        $admin = Session::get('admin');

        return view('admin.daftar_permohonan', compact('permohonans'), compact('admin'));
    }

    public function editPermohonan(){
        $input = Request::all();
        $admin = Session::get('admin');

        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        return view('admin.edit_permohonan', compact('permohonan'), compact('admin'));
    }

    public function updatePermohonan(){
        $input = Request::all();
        $permohonan = Permohonan::where('id', '=', $input['id'])->firstOrFail();

        if($input['status_permohonan'] == 'Selesai'){
            $perizinan = [
                    'id_pemohon' => $permohonan->id_pemohon,
                    'jenis_pemohon' => $permohonan->jenis_pemohon,
                    'jenis_permohonan' => $permohonan->jenis_permohonan,
                    'id_surat_tanah' => $permohonan->id_surat_tanah,
                    'lokasi_tanah' => $permohonan->lokasi_tanah,
                    'status_perizinan' => 'aktif',
                    'biaya_retribusi' => $permohonan->biaya_retribusi,
                    'bukti_pembayaran' => $permohonan->bukti_pembayaran,
                    'email_pemohon' => $permohonan->email_pemohon,
                    'tanggal_dibuat' => $permohonan->tanggal_dibuat,
                    'tanggal_expired' => $permohonan->tanggal_expired,
                    'lampiran' => $permohonan->lampiran,
                    'key' => $permohonan->key,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ];
            $db = Perizinan::create($perizinan);

            $data = [
                    'perizinan' => $perizinan
                ];

            try {
                Mail::send('admin.notifikasi_surat_izin', $data, function($message) use ($perizinan)
                {
                    $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                    $message->to($perizinan['email_pemohon'])->subject('Permohonan Surat Izin Diterima');
                });
            } catch (Exception $e) {
                return Redirect::route('admin/daftar_izin');
            }

            return redirect::to('admin/delete_permohonan/'.$input['id']);
        } else {
            $permohonan->biaya_retribusi = $input['biaya_retribusi'];
            $permohonan->status_permohonan = $input['status_permohonan'];

            $permohonan->save();

            return redirect('admin/daftar_permohonan');
        }
    }

    public function viewLaporan(){
        $admin = Session::get('admin');
        return view('admin.laporan',compact('admin'));
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
            Mail::send('admin.notifikasi_tolak_permohonan', $data, function($message) use ($_permohonan)
            {
                $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                $message->to($_permohonan['email_pemohon'])->subject('Permohonan Surat Izin Ditolak');
            });
        } catch (Exception $e) {
            return Redirect::route('admin/daftar_permohonan');
        }

        $permohonan->delete();

        return redirect::to('admin/daftar_permohonan'); 
    }

    public function entryPerizinan(){
        
    }

    public function updatePerizinan(){
        $input = Request::all();
        $perizinan = Perizinan::where('id', '=', $input['id'])->firstOrFail();

        if($input['status_perizinan'] != $perizinan->status_perizinan){
            $_perizinan = [
                    'id_pemohon' => $perizinan->id_pemohon,
                    'jenis_pemohon' => $perizinan->jenis_pemohon,
                    'jenis_permohonan' => $perizinan->jenis_permohonan,
                    'id_surat_tanah' => $perizinan->id_surat_tanah,
                    'lokasi_tanah' => $perizinan->lokasi_tanah,
                    'status_perizinan' => $input['status_perizinan'],
                    'biaya_retribusi' => $perizinan->biaya_retribusi,
                    'bukti_pembayaran' => $perizinan->bukti_pembayaran,
                    'email_pemohon' => $perizinan->email_pemohon,
                    'tanggal_dibuat' => $perizinan->tanggal_dibuat,
                    'tanggal_expired' => $perizinan->tanggal_expired,
                    'lampiran' => $perizinan->lampiran,
                    'key' => $perizinan->key,
                ];

            $data = [
                    'perizinan' => $perizinan
                ];

            try {
                Mail::send('admin.notifikasi_status_izin', $data, function($message) use ($_perizinan)
                {
                    $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                    $message->to($_perizinan['email_pemohon'])->subject('Perubahan Status Izin');
                });
            } catch (Exception $e) {
                return Redirect::route('admin/daftar_izin');
            }

            $perizinan->status_perizinan = $input['status_perizinan'];
            $perizinan->save();
            return redirect::to('admin/daftar_izin');
        } else {

            return redirect('admin/daftar_izin');
        }
    }

    public function deletePerizinan($id){
        $perizinan = Perizinan::where('id', '=', $id)->firstOrFail();

        $_perizinan = [
                    'id_pemohon' => $perizinan->id_pemohon,
                    'jenis_pemohon' => $perizinan->jenis_pemohon,
                    'jenis_permohonan' => $perizinan->jenis_permohonan,
                    'id_surat_tanah' => $perizinan->id_surat_tanah,
                    'lokasi_tanah' => $perizinan->lokasi_tanah,
                    'status_perizinan' => $input['status_perizinan'],
                    'biaya_retribusi' => $perizinan->biaya_retribusi,
                    'bukti_pembayaran' => $perizinan->bukti_pembayaran,
                    'email_pemohon' => $perizinan->email_pemohon,
                    'tanggal_dibuat' => $perizinan->tanggal_dibuat,
                    'tanggal_expired' => $perizinan->tanggal_expired,
                    'lampiran' => $perizinan->lampiran,
                    'key' => $perizinan->key,
            ];

        $data = [
                'perizinan' => $_perizinan
            ];

        try {
            Mail::send('admin.notifikasi_izin_dicabut', $data, function($message) use ($_perizinan)
            {
                $message->from('if3250.ppl.parkhere@gmail.com', 'Administrasi Aplikasi Terkait Izin Parkir dan Terminal');
                $message->to($_perizinan['email_pemohon'])->subject('Surat Izin Dicabut');
            });
        } catch (Exception $e) {
            return Redirect::route('admin/daftar_izin');
        }

        $perizinan->delete();

        return redirect::to('admin/daftar_izin'); 
    }

    public function getPerizinan(){
        try{
            $admin = Session::get('admin');
        } catch (Exception $e) {
            return Redirect::route('admin/login');
        }

        $perizinans = Perizinan::all();

        return view('admin.daftar_izin', compact('perizinans', 'admin'));
    }

    public function aturPerizinan(){
        $input = Request::all();
        $admin = Session::get('admin');

        $perizinan = Perizinan::where('id', '=', $input['id'])->firstOrFail();

        return view('admin.atur_perizinan', compact('perizinan', 'admin'));
    }

    public function generateLaporan(){
        $input = Request::all();
        $admin = Session::get('admin');
        $tanggal_awal = $input['tanggal_awal'];
        $tanggal_akhir = $input['tanggal_akhir'];
        $permohonans = Permohonan::whereBetween('created_at', array($tanggal_awal, $tanggal_akhir))->get();
        $sjpermohonan = 0;
        $sjpemohon = 0;
        foreach ($permohonans as $tmp) {
            if($tmp->jenis_permohonan == 'Parkir'){
                $sjpermohonan += 1;
            }
            if($tmp->jenis_pemohon == 'Organisasi'){
                $sjpemohon += 1;
            }
        }

        return view("admin.generate_laporan", compact('admin', 'permohonans', 'sjpemohon', 'sjpermohonan', 'tanggal_awal', 'tanggal_akhir'));
    }

    public function generatePDF(){
        $input = Request::all();
        $admin = Session::get('admin');
        $tanggal_awal = $input['tanggal_awal'];
        $tanggal_akhir = $input['tanggal_akhir'];
        $permohonans = Permohonan::whereBetween('created_at', array($tanggal_awal, $tanggal_akhir))->get();
        
        $data = [
                'permohonans' => $permohonans,
                'sjpemohon' => $input['sjpemohon'],
                'sjpermohonan' => $input['sjpermohonan'],
            ];


        $pdf = PDF::loadView('admin.generate_pdf', $data);
        return $pdf->stream('laporan-'.$tanggal_awal.'-'.$tanggal_akhir.'.pdf');
    }

    public function generateSuratIzin(){
        $input = Request::all();
        if(Session::has('admin')){
            $admin = Session::get('admin');
            $perizinan = Perizinan::where('id', $input['id'])->firstOrFail();
            
            $data = [
                    'perizinan' => $perizinan,
                    'tanggal' => Carbon::now(),
                    'tahun' => Carbon::now()->year
                ];


            $pdf = PDF::loadView('admin.template_surat_izin', $data);
            return $pdf->stream('surat izin-'.$perizinan->id_pemohon.'.pdf');
        } else {
            return redirect::to('admin/login');
        }
    }

    public function logout(){
        Session::forget('admin');
        return redirect('admin/login');
    }
}
