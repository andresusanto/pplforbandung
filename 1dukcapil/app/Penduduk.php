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
}
