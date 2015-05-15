<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Status;
use App\Models\Izin;
class Izin extends Model {

	protected $table = 'izin';
    protected $fillable = ['deskripsi','jenisizin_id','nama_perusahaan','alamat_perusahaan','nama_garasi','npwp'];

    public $timestamps = false;
    public static $rules = [
        'jenisizin_id' => ['required']
    ];

    public function pengguna(){
        return $this->belongsTo('App\Models\Pengguna','pengguna_id','id');
    }

    public function jenisIzin(){
        return $this->belongsTo('App\Models\JenisIzin','jenisizin_id','id');
    }

    public function dokumens(){
        return $this->hasMany('App\Models\Dokumen','izin_id','id');
    }

    public function status(){
        return $this->belongsToMany('App\Models\Status','status_izin','izin_id','status_id');
    }

    public function  getCurrentNamaStatus(){
        $current_status = $this->status()->orderBy('timestamp','desc')->first();
        if ($current_status == null){
            return '';
        } else {
            return $current_status->nama;
        }
    }

    public function  getCurrentStatusId(){
        $current_status = $this->status()->orderBy('timestamp','desc')->first();
        if ($current_status == null){
            return '';
        } else {
            return $current_status->id;
        }
    }

    public function updatedByPengguna(){
        $this->updated_by_pengguna = 1;
        $this->save();
    }

    public function updatedByAdmin(){
        $this->updated_by_admin = 1;
        $this->save();
    }

    public function readedByPengguna(){
        $this->updated_by_admin = 0;
        $this->save();
    }

    public function readedByAdmin()
    {
        $this->updated_by_pengguna = 0;
        $this->save();
    }

    public function validMulaiPerpanjangIzin()
    {
        if ($this->tanggal_perpanjangan == null){
            return false;
        } else {
            return strtotime($this->tanggal_perpanjangan) - 3600 * 24 * 30 < time();
        }
        
    }

    public function getNamaIzin() {
        $namaIzin = JenisIzin::findOrFail($this->jenisizin_id);
        if ($namaIzin == null) {
            return '';
        }
        return $namaIzin->nama;
    }
}
