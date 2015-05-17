<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model {

	protected $fillable = [

    ];

    protected $table = "pajak";

    protected $dates = ['tanggal'];

    public $timestamps = false;

}
