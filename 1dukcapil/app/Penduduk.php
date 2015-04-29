<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model {

	//
    protected $table = 'penduduk';

    protected $fillable = ['*'];

    protected $date = ['waktuLahir'];

    public function aktaKelahiran()
    {
        return $this->hasOne('App\AktaKelahiran', 'idPenduduk');
    }

    public function kartuKeluarga()
    {
        return $this->belongsToMany('App\KartuKeluarga', 'anggota_kartu_keluarga', 'idPenduduk', 'idKartuKeluarga');
    }

    public function aktaKematian()
    {
        return $this->hasOne('App\AktaKematian', 'idPenduduk');
    }

    public function kartuTandaPenduduk()
    {
        return $this->hasOne('App\KartuTandaPenduduk', 'idPenduduk');
    }
}
