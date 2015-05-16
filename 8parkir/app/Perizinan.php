<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model {
	
	protected $fillable = [
      'id_pemohon', 'jenis_pemohon', 'jenis_permohonan', 'id_surat_tanah', 'lokasi_tanah', 'status_perizinan',
      'biaya_retribusi', 'bukti_pembayaran',  'email_pemohon', 'tanggal_dibuat', 'tanggal_expired', 'lampiran', 'key'
    ];

}
