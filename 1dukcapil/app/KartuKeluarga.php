<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model {

	//
    protected $table = 'kartu_keluarga';

    protected $fillable = ['*'];

    protected $dates = ['waktuCetak'];

    public $incrementing = false;

    // TODO: generate Id
    public function generateId() {
        $this->id = KartuKeluarga::all()->count() + 1;
    }

    public function penduduk()
    {
        return $this->belongsToMany('App\Penduduk', 'anggota_kartu_keluarga', 'idKartuKeluarga', 'idPenduduk');
    }
}
