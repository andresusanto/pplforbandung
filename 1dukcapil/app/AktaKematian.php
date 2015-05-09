<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AktaKematian extends Model {

	//
    protected $table = 'akta_kematian';

    protected $fillable = ['*'];

    protected $dates = ['waktuCetak', 'waktuMati'];

    public function penduduk()
    {
        return $this->belongsTo('\App\Penduduk', 'idPenduduk');
    }
}
