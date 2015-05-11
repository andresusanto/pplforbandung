<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model {

	protected $table='usaha';

	protected $fillable = [
		'nama',
		'lokasi',
		'email',
		'telepon',
		'bidang',
		'skala',
		'imagepath'
	];

}
