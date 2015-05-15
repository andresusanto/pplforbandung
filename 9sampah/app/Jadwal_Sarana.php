<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_sarana extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jadwal_sarana';

	// /**
	//  * The attributes that are mass assignable.
	//  *
	//  * @var array
	//  */
	protected $fillable = ['tanggal', 'durasi', 'jenis', 'plat', 'lokasi'];

	public $timestamps = false;

	// /**
	//  * The attributes excluded from the model's JSON form.
	//  *
	//  * @var array
	//  */
	// protected $hidden = ['password', 'remember_token'];

}
