<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model {

	const STATUS_BELUM = 1;
	const STATUS_PENDING = 2;
	const STATUS_OK = 3;
	const STATUS_BERMASALAH = 4;
    const STATUS_BUTUH_PERPANJANGAN = 5;
    
	protected $table = 'dokumen';
    public $timestamps = false;

    public function template(){
        return $this->belongsTo('App\Models\Template','template_id','id');
    }
}
