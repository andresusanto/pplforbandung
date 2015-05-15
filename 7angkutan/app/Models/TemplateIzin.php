<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateIzin extends Model {
	protected $table = 'template_izin';
    public $timestamps = false;

    protected $primaryKey = ['jenisizin_id','template_id'];

    public function templates()
    {
        return $this->belongsTo('App\Models\Template','template_id','id');
    }
}
