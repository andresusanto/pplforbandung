<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BayarPajak extends Model {

	protected $table = 'bayar_pajaks';
	protected $fillable = [
		'npwpd',
		'jenis_pajak',
		'masa_pajak',
		'nomor_stp',
		'jumlah_pembayaran',
		'status_pembayaran',
		'tanggal_pembayaran'
	];

	public $timestamps = false;

}
