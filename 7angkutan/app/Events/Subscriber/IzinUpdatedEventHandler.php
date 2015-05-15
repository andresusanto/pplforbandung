<?php namespace App\Events\Subscriber;


use App\Events\Event;
use App\Models\Izin;
use App\Models\Pengguna;
use App\Models\Status;
use App\Models\StatusIzin;

use \Mail;
use \Session;

//use Illuminate\Queue\SerializesModels;

class IzinUpdatedEventHandler {

	//use SerializesModels;

	public function onIzinUpdatedByAdmin($izin){
		$izin->updated_by_admin = 1;
        $izin->save();
        if ($izin->getCurrentStatusId() == Status::STATUS_DITERIMA){
            $izin->tanggal_perpanjangan = date('Y-m-d',time() + 365 * 24 * 3600 * $izin->jenisIzin->tahun_berlaku);
            $izin->save();
        }
        $pengguna = $izin->pengguna;
        $data = [
            'izin' => $izin,
        ];
        try {
            Mail::send('izin.pengguna.email_notifikasi', $data, function($message) use ($pengguna)
            {
              $message->from('if3250.p1.kel1@gmail.com', 'Administrasi Aplikasi Terkait Izin Angkutan');
              $message->to($pengguna['email'], $pengguna['name'])->subject('Perubahan status izin angkutan');
            });
        } catch (\Exception $e) {
            Session::set('notif-danger','Email gagal dikirim');
        }
        
	}

    public function onIzinUpdatedByPengguna($izin){
        $izin->updated_by_pengguna = 1;
        $izin->save();
    }

	public function subscribe($events){
		$events->listen('izin.updated_by_admin','App\Events\Subscriber\IzinUpdatedEventHandler@onIzinUpdatedByAdmin');
		$events->listen('izin.updated_by_pengguna','App\Events\Subscriber\IzinUpdatedEventHandler@onIzinUpdatedByPengguna');
    }
}
