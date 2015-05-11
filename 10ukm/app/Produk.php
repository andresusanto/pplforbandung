<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model {

	protected $table = 'produk';

	protected $fillable = [
		'nama',
		'jenis',
		'deskripsi',
		'id_usaha'
	];

}
