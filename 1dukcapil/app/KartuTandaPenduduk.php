<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuTandaPenduduk extends Model {

	//
    protected $table = 'kartu_tanda_penduduk';

    public function penduduk()
    {
        return $this->belongsTo('\App\Penduduk', 'idPenduduk');
    }

    public function user()
    {
    	return $this->hasOne('App\User', 'email');
    }
}
