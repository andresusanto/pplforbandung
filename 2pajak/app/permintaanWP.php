<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class permintaanWP extends Model {

	protected $table = 'permintaan_w_ps';
	protected $fillable = [
		'npwpd',
		'kategori_permintaan',
		'jenis_pajak',
		'tahun_pajak',
		'alasan_pengaduan',
		'harga_pajak_seharusnya',
		'jenis_sanksi',
		'nomor_stp',
		'jumlah_sanksi',
		'alasan_permohonan',
		'alasan_penghapusan'
	];

	public $timestamps = false;
}
