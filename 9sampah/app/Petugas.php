<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'petugas';

	// /**
	//  * The attributes that are mass assignable.
	//  *
	//  * @var array
	//  */
	protected $fillable = ['nama', 'nip', 'pekerjaan', 'username', 'password'];
	public $timestamps = false;
	
	// /**
	//  * The attributes excluded from the model's JSON form.
	//  *
	//  * @var array
	//  */
	// protected $hidden = ['password', 'remember_token'];

}
