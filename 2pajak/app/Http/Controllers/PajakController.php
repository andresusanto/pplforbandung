<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\WajibPajak;
use App\BayarPajak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Classes\SSOData;

class PajakController extends Controller {

    //public function search($npwpd){
	public function search(){
		$arr=SSOData::GetNPWP();
		$npwpd=$arr['npwpd'];
        $pajaks = Pajak::where('npwpd','=',$npwpd)->get();
        return view('pajak.lunas',compact('pajaks'));
    }

    //public function add($npwpd){
    public function add(){
		$arr=SSOData::GetNPWP();
		$npwpd=$arr['npwpd'];
        return view('pajak.add',compact('npwpd'));
    }

    public function submit(){
		$arr=SSOData::GetNPWP();
		$npwpd=$arr['npwpd'];
        $pajak = new Pajak;
        $pajak->npwpd = $npwpd;
        $pajak->kategori = Input::get('kategori');
        $pajak->aset_kepemilikan = Input::get('aset');
        $pajak->jumlah_pajak = 0.1*Input::get('aset');
        $pajak->status_pelunasan = 0;
        $ldate = date_create('now');
		date_add($ldate,date_interval_create_from_date_string("1 year"));
        $pajak->tanggal = $ldate->format('Y-m-d');
        $pajak->save();
        return $this->search($npwpd);
    }
	
	public function Test(){
		$arr=SSOData::GetDataPenduduk();
		if (get_class($redir = (object) $arr) === 'Illuminate\Http\RedirectResponse'){
			return $redir;
		}
		return 'NIK = '.$arr['NIK'].'<br>'.'Nama = '.$arr['Nama'];
	}
	
	public function UpdateToken(){
		return SSOData::DukcapilGetAccessToken();
	}
}
