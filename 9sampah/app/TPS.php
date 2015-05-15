<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TPS extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tps';

	// /**
	//  * The attributes that are mass assignable.
	//  *
	//  * @var array
	//  */
	protected $fillable = ['nama', 'lokasi', 'volume'];
	public $timestamps = false;

	// /**
	//  * The attributes excluded from the model's JSON form.
	//  *
	//  * @var array
	//  */
	// protected $hidden = ['password', 'remember_token'];

}
