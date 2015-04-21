<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AktaKelahiran extends Model {

	//
    protected $table = 'akta_kelahiran';

    protected $fillable = ['*'];

    protected $dates = ['waktuCetak'];

    public function penduduk()
    {
        return $this->belongsTo('\App\Penduduk', 'idPenduduk');
    }

}
