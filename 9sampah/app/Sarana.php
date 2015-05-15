<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Sarana';

	// /**
	//  * The attributes that are mass assignable.
	//  *
	//  * @var array
	//  */
	protected $fillable = ['jenis', 'plat'];
	public $timestamps = false;

	// /**
	//  * The attributes excluded from the model's JSON form.
	//  *
	//  * @var array
	//  */
	// protected $hidden = ['password', 'remember_token'];

}
