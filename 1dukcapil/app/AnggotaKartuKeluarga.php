<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaKartuKeluarga extends Model {

	//
    protected $table = 'anggota_kartu_keluarga';

    protected $fillable = ['*'];

    public $incrementing = false;
}
