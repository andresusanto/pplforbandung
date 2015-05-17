<?php namespace App\Http\Controllers;
use App\User;
use DB;
use App\Perizinan;
use App\FormulirHO;
use App\FormulirSIUP;
use App\FormulirILO;
use App\FormulirIMB;
use App\FormulirIUI;
class PerizinanController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	public function cekStatusIzin($str)
	{
		$izins = Perizinan::where("id_pemohon",$str)->select(array('kode_izin','jenis_izin','status'))->get();
		return $izins->toJson();
	}

	public function cekStatusKodeIzin($str,$kode)
	{
		$izins = Perizinan::where("jenis_izin",$str)->where("kode_izin",$kode)->select(array('kode_izin','jenis_izin','status'))->get()->first();
		return $izins->toJson();
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function showListPerizinan()
	{

		return view('listperizinan');
	}

	public function showDetailPerizinan($str)
	{
		return view('detailperizinan.'.$str);
	}

	public function showFormulir($str)
	{
		if(\Session::has('id')){
			if(\Session::get('peran')==3){
				return view('isiform.'.$str);
			}else{
				$str = "Anda tidak bisa menggunakan akun ini untuk mengajukan izin";
				$url = "../home";
				return view("../status.failed",compact("str"),compact('url'));
			}
		}else{

			$str = "Anda harus login untuk mengajukan izin";
			$url = "../login";
			return view("../status.failed",compact("str"),compact('url'));
		}
	}

	public function uploadFormulir($str)
	{
		if($str == "ho"){
			$formulir = new FormulirHO;
			$formulir->id_pemohon = (\Session::get('id'));
			$formulir->nama_pengusaha = (\Request::get('nama_pengusaha'));
			$formulir->alamat_pemilik = (\Request::get('alamat_pemilik'));
			$formulir->kebangsaan = (\Request::get('kebangsaan'));
			$formulir->nama_perusahaan = (\Request::get('nama_perusahaan'));
			$formulir->letak_perusahaan = (\Request::get('letak_perusahaan'));
			$formulir->bentuk_perusahaan = (\Request::get('bentuk_perusahaan'));
			$formulir->status_perusahaan = (\Request::get('status_perusahaan'));
			$formulir->jenis_usaha = (\Request::get('jenis_usaha'));
			$formulir->permohonan = (\Request::get('permohonan'));
			$formulir->luas_tanah = (\Request::get('luas_tanah'));
			$formulir->batas_utara = (\Request::get('batas_utara'));
			$formulir->batas_timur = (\Request::get('batas_timur'));
			$formulir->batas_selatan = (\Request::get('batas_selatan'));
			$formulir->batas_barat = (\Request::get('batas_barat'));
			$formulir->luas_bangunan = (\Request::get('luas_bangunan'));
			$formulir->keadaan_bangunan = (\Request::get('keadaan_bangunan'));
			$formulir->status_tanah = (\Request::get('status_tanah'));
			$formulir->jumlah_tenaga_kerja_pribumi_lk = (\Request::get('jumlah_tenaga_kerja_pribumi_lk'));
			$formulir->jumlah_tenaga_kerja_pribumi_pr = (\Request::get('jumlah_tenaga_kerja_pribumi_pr'));
			$formulir->jumlah_tenaga_kerja_asing_lk = (\Request::get('jumlah_tenaga_kerja_asing_lk'));
			$formulir->jumlah_tenaga_kerja_asing_pr = (\Request::get('jumlah_tenaga_kerja_asing_pr'));
			$formulir->banyak_peralatan = (\Request::get('banyak_peralatan'));
			$formulir->sumber_air = (\Request::get('sumber_air'));
			$formulir->jumlah_jam_kerja = (\Request::get('jumlah_jam_kerja'));
			$formulir->lain_lain =(\Request::get('lain_lain'));
			$formulir->save();
		} else
		if($str == "siup"){
			$formulir = new FormulirSIUP;
			$formulir->id_pemohon=(\Session::get('id'));
			$formulir->nama_pemilik=(\Request::get('nama_pemilik'));
			$formulir->alamat_pemilik=(\Request::get('alamat_pemilik'));
			$formulir->tempat_lahir_pemilik=(\Request::get('tempat_lahir_pemilik'));
			$formulir->nomor_telepon_pemilik=(\Request::get('nomor_telepon_pemilik'));
			$formulir->nomor_ktp_pemilik=(\Request::get('nomor_ktp_pemilik'));
			$formulir->kewarganegaraan_pemilik=(\Request::get('kewarganegaraan_pemilik'));
			$formulir->nama_perusahaan=(\Request::get('nama_perusahaan'));
			$formulir->alamat_perusahaan=(\Request::get('alamat_perusahaan'));
			$formulir->nomor_telepon_perusahaan=(\Request::get('nomor_telepon_perusahaan'));
			$formulir->provinsi_perusahaan=(\Request::get('provinsi_perusahaan'));
			$formulir->kabupaten_perusahaan=(\Request::get('kabupaten_perusahaan'));
			$formulir->kecamatan_perusahaan=(\Request::get('kecamatan_perusahaan'));
			$formulir->kelurahan_perusahaan=(\Request::get('kelurahan_perusahaan'));
			$formulir->status_perusahaan=(\Request::get('status_perusahaan'));
			$formulir->kodepos_perusahaan=(\Request::get('kodepos_perusahaan'));
			$formulir->nomor_akta_pendirian=(\Request::get('nomor_akta_pendirian'));
			$formulir->nomor_pengesahan_pendirian=(\Request::get('nomor_pengesahan_pendirian'));
			$formulir->nomor_akta_perubahan=(\Request::get('nomor_akta_perubahan'));
			$formulir->nomor_pengesahan_perubahan=(\Request::get('nomor_pengesahan_perubahan'));
			$formulir->modal_perusahaan=(\Request::get('modal_perusahaan'));
			$formulir->total_saham=(\Request::get('total_saham'));
			$formulir->persen_nasional=(\Request::get('persen_nasional'));
			$formulir->persen_asing=(\Request::get('persen_asing'));
			$formulir->kelembagaan=(\Request::get('kelembagaan'));
			$formulir->kegiatan_usaha=(\Request::get('kegiatan_usaha'));
			$formulir->dagangan_utama=(\Request::get('dagangan_utama'));
			$formulir->save();

		} else
		if($str == "ilo"){
			$formulir = new FormulirILO;
			$formulir->id_pemohon=(\Session::get('id'));
			$formulir->nama_pemohon=(\Request::get('nama_pemohon'));
			$formulir->jabatan_pemohon=(\Request::get('jabatan_pemohon'));

			$formulir->alamat_pemohon=(\Request::get('alamat_pemohon'));
			$formulir->nama_perusahaan=(\Request::get('nama_perusahaan'));
			$formulir->alamat_perusahaan=(\Request::get('alamat_perusahaan'));
			$formulir->akta_pendirian=(\Request::get('akta_pendirian'));
			$formulir->npwp=(\Request::get('npwp'));
			$formulir->luas_perusahaan=(\Request::get('luas_perusahaan'));
			$formulir->letak_blok_perusahaan=(\Request::get('letak_blok_perusahaan'));
			$formulir->letak_kelurahan_perusahaan=(\Request::get('letak_kelurahan_perusahaan'));
			$formulir->letak_kecamatan_perusahaan=(\Request::get('letak_kecamatan_perusahaan'));
			$formulir->kondisi_perusahaan=(\Request::get('kondisi_perusahaan'));
			$formulir->nomor_persil=(\Request::get('nomor_persil'));
			$formulir->nama_pemilik=(\Request::get('nama_pemilik'));

			$formulir->save();
		} else
		if($str == "imb"){
			$formulir = new FormulirIMB;
			$formulir->id_pemohon=(\Session::get('id'));
			$formulir->nama_pemohon=(\Request::get('nama_pemohon'));
			$formulir->jabatan_pemohon=(\Request::get('jabatan_pemohon'));
			$formulir->alamat_pemohon=(\Request::get('alamat_pemohon'));
			$formulir->lokasi_kampung_lahan=(\Request::get('lokasi_kampung_lahan'));
			$formulir->lokasi_kelurahan_lahan=(\Request::get('lokasi_kelurahan_lahan'));
			$formulir->lokasi_kecamatan_lahan=(\Request::get('lokasi_kecamatan_lahan'));
			$formulir->status_lahan=(\Request::get('status_lahan'));
			$formulir->nomor_surat_kepemilikan=(\Request::get('nomor_surat_kepemilikan'));
			$formulir->luas_tanah=(\Request::get('luas_tanah'));
			$formulir->nama_pemilik_lahan=(\Request::get('nama_pemilik_lahan'));
			$formulir->jumlah_lantai_bangunan=(\Request::get('jumlah_lantai_bangunan'));
			$formulir->luas_lantai_dasar=(\Request::get('luas_lantai_dasar'));
			$formulir->luas_lantai_atas=(\Request::get('luas_lantai_atas'));
			$formulir->luas_bangunan_pelengkap=(\Request::get('luas_bangunan_pelengkap'));
			$formulir->jumlah_luas_bangunan=(\Request::get('jumlah_luas_bangunan'));
			$formulir->rencana_fungsi_bangunan=(\Request::get('rencana_fungsi_bangunan'));
			$formulir->save();
		} else
		if($str == "iui"){
			$formulir = new FormulirIUI;
			$formulir->id_pemohon=(\Session::get('id'));
			$formulir->nama_pemohon=(\Request::get('nama_pemohon'));
			$formulir->alamat_pemohon=(\Request::get('alamat_pemohon'));
			$formulir->nomor_telepon_pemohon=(\Request::get('nomor_telepon_pemohon'));
			$formulir->nama_perusahaan=(\Request::get('nama_perusahaan'));
			$formulir->alamat_perusahaan=(\Request::get('alamat_perusahaan'));
			$formulir->nomor_telepon_perusahaan=(\Request::get('nomor_telepon_perusahaan'));
			$formulir->npwp=(\Request::get('npwp'));
			$formulir->nama_pemilik=(\Request::get('nama_pemilik'));
			$formulir->alamat_pemilik=(\Request::get('alamat_pemilik'));
			$formulir->no_telepon_pemilik=(\Request::get('no_telepon_pemilik'));
			$formulir->lokasi_kelurahan_pabrik=(\Request::get('lokasi_kelurahan_pabrik'));
			$formulir->lokasi_kecamatan_pabrik=(\Request::get('lokasi_kecamatan_pabrik'));
			$formulir->lokasi_kabupaten_pabrik=(\Request::get('lokasi_kabupaten_pabrik'));
			$formulir->kepemilikan_pabrik=(\Request::get('kepemilikan_pabrik'));
			$formulir->luas_bangunan_pabrik=(\Request::get('luas_bangunan_pabrik'));
			$formulir->luas_tanah_pabrik=(\Request::get('luas_tanah_pabrik'));
			$formulir->alat_utama_produksi=(\Request::get('alat_utama_produksi'));
			$formulir->alat_pembantu_produksi=(\Request::get('alat_pembantu_produksi'));
			$formulir->tenaga_penggerak=(\Request::get('tenaga_penggerak'));
			$formulir->jenis_industri=(\Request::get('jenis_industri'));
			$formulir->komoditi=(\Request::get('komoditi'));
			$formulir->kapasita_terpasang_per_tahun=(\Request::get('kapasita_terpasang_per_tahun'));
			$formulir->kebutuhan_bahan_baku=(\Request::get('kebutuhan_bahan_baku'));
			$formulir->jumlah_tenaga_kerja_pribumi_lk=(\Request::get('jumlah_tenaga_kerja_pribumi_lk'));
			$formulir->jumlah_tenaga_kerja_pribumi_pr=(\Request::get('jumlah_tenaga_kerja_pribumi_pr'));
			$formulir->jumlah_tenaga_kerja_asing_lk=(\Request::get('jumlah_tenaga_kerja_asing_lk'));
			$formulir->jumlah_tenaga_kerja_asing_pr=(\Request::get('jumlah_tenaga_kerja_asing_pr'));
			$formulir->nilai_investasi=(\Request::get('nilai_investasi'));
			$formulir->merek=(\Request::get('merek'));
			$formulir->save();
		}


		$perizinan = new Perizinan;
		$perizinan->id_pemohon = \Session::get('id');
		$perizinan->kode_izin = date("Ymd").sprintf('%03d', $formulir->id%1000);
		$perizinan->jenis_izin = $str;
		$perizinan->id_izin = $formulir->id;
		$perizinan->updated_by_user = "true";
		$perizinan->save();
		if($str=="ho")
			{$url = "../listformulir";}
		else
			{$url = "../uploaddokumenawal/".$str."/".$formulir->id;}
		$str = "Berhasil Mengunggah Formulir";
		return view(".../status.success",compact("str"),compact('url'));
	}


	public function checkEditFormulir($str,$id)
	{
		try{
			$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)->where('id_pemohon',\Session::get('id'))
			->first();
			$formulir->touch();

			if($formulir->status=='Disahkan'){
				$str = "Anda tidak diizinkan untuk mengedit perizinan ini";
				$url = "../../listformulir";
				return view("status.failed",compact("str"),compact('url'));
			}
			$formulir->updated_by_user = 'true';
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengedit perizinan ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}

		if($str == "ho"){
			$formulir = FormulirHO::find($id);
			$formulir->nama_pengusaha = (\Request::get('nama_pengusaha'));
			$formulir->alamat_pemilik = (\Request::get('alamat_pemilik'));
			$formulir->kebangsaan = (\Request::get('kebangsaan'));
			$formulir->nama_perusahaan = (\Request::get('nama_perusahaan'));
			$formulir->letak_perusahaan = (\Request::get('letak_perusahaan'));
			$formulir->bentuk_perusahaan = (\Request::get('bentuk_perusahaan'));
			$formulir->status_perusahaan = (\Request::get('status_perusahaan'));
			$formulir->jenis_usaha = (\Request::get('jenis_usaha'));
			$formulir->permohonan = (\Request::get('permohonan'));
			$formulir->luas_tanah = (\Request::get('luas_tanah'));
			$formulir->batas_utara = (\Request::get('batas_utara'));
			$formulir->batas_timur = (\Request::get('batas_timur'));
			$formulir->batas_selatan = (\Request::get('batas_selatan'));
			$formulir->batas_barat = (\Request::get('batas_barat'));
			$formulir->luas_bangunan = (\Request::get('luas_bangunan'));
			$formulir->keadaan_bangunan = (\Request::get('keadaan_bangunan'));
			$formulir->status_tanah = (\Request::get('status_tanah'));
			$formulir->jumlah_tenaga_kerja_pribumi_lk = (\Request::get('jumlah_tenaga_kerja_pribumi_lk'));
			$formulir->jumlah_tenaga_kerja_pribumi_pr = (\Request::get('jumlah_tenaga_kerja_pribumi_pr'));
			$formulir->jumlah_tenaga_kerja_asing_lk = (\Request::get('jumlah_tenaga_kerja_asing_lk'));
			$formulir->jumlah_tenaga_kerja_asing_pr = (\Request::get('jumlah_tenaga_kerja_asing_pr'));
			$formulir->banyak_peralatan = (\Request::get('banyak_peralatan'));
			$formulir->sumber_air = (\Request::get('sumber_air'));
			$formulir->jumlah_jam_kerja = (\Request::get('jumlah_jam_kerja'));
			$formulir->lain_lain =(\Request::get('lain_lain'));
			$formulir->save();
		} else
		if($str == "siup"){
			$formulir = FormulirSIUP::find($id);
			$formulir->nama_pemilik=(\Request::get('nama_pemilik'));
			$formulir->alamat_pemilik=(\Request::get('alamat_pemilik'));
			$formulir->tempat_lahir_pemilik=(\Request::get('tempat_lahir_pemilik'));
			$formulir->nomor_telepon_pemilik=(\Request::get('nomor_telepon_pemilik'));
			$formulir->nomor_ktp_pemilik=(\Request::get('nomor_ktp_pemilik'));
			$formulir->kewarganegaraan_pemilik=(\Request::get('kewarganegaraan_pemilik'));
			$formulir->nama_perusahaan=(\Request::get('nama_perusahaan'));
			$formulir->alamat_perusahaan=(\Request::get('alamat_perusahaan'));
			$formulir->nomor_telepon_perusahaan=(\Request::get('nomor_telepon_perusahaan'));
			$formulir->provinsi_perusahaan=(\Request::get('provinsi_perusahaan'));
			$formulir->kabupaten_perusahaan=(\Request::get('kabupaten_perusahaan'));
			$formulir->kecamatan_perusahaan=(\Request::get('kecamatan_perusahaan'));
			$formulir->kelurahan_perusahaan=(\Request::get('kelurahan_perusahaan'));
			$formulir->status_perusahaan=(\Request::get('status_perusahaan'));
			$formulir->kodepos_perusahaan=(\Request::get('kodepos_perusahaan'));
			$formulir->nomor_akta_pendirian=(\Request::get('nomor_akta_pendirian'));
			$formulir->nomor_pengesahan_pendirian=(\Request::get('nomor_pengesahan_pendirian'));
			$formulir->nomor_akta_perubahan=(\Request::get('nomor_akta_perubahan'));
			$formulir->nomor_pengesahan_perubahan=(\Request::get('nomor_pengesahan_perubahan'));
			$formulir->modal_perusahaan=(\Request::get('modal_perusahaan'));
			$formulir->total_saham=(\Request::get('total_saham'));
			$formulir->persen_nasional=(\Request::get('persen_nasional'));
			$formulir->persen_asing=(\Request::get('persen_asing'));
			$formulir->kelembagaan=(\Request::get('kelembagaan'));
			$formulir->kegiatan_usaha=(\Request::get('kegiatan_usaha'));
			$formulir->dagangan_utama=(\Request::get('dagangan_utama'));
			$formulir->save();

		} else
		if($str == "ilo"){
			$formulir =  FormulirILO::find($id);
			$formulir->nama_pemohon=(\Request::get('nama_pemohon'));
			$formulir->jabatan_pemohon=(\Request::get('jabatan_pemohon'));

			$formulir->alamat_pemohon=(\Request::get('alamat_pemohon'));
			$formulir->nama_perusahaan=(\Request::get('nama_perusahaan'));
			$formulir->alamat_perusahaan=(\Request::get('alamat_perusahaan'));
			$formulir->akta_pendirian=(\Request::get('akta_pendirian'));
			$formulir->npwp=(\Request::get('npwp'));
			$formulir->luas_perusahaan=(\Request::get('luas_perusahaan'));
			$formulir->letak_blok_perusahaan=(\Request::get('letak_blok_perusahaan'));
			$formulir->letak_kelurahan_perusahaan=(\Request::get('letak_kelurahan_perusahaan'));
			$formulir->letak_kecamatan_perusahaan=(\Request::get('letak_kecamatan_perusahaan'));
			$formulir->kondisi_perusahaan=(\Request::get('kondisi_perusahaan'));
			$formulir->nomor_persil=(\Request::get('nomor_persil'));
			$formulir->nama_pemilik=(\Request::get('nama_pemilik'));

			$formulir->save();
		} else
		if($str == "imb"){
			$formulir =  FormulirIMB::find($id);
			$formulir->nama_pemohon=(\Request::get('nama_pemohon'));
			$formulir->jabatan_pemohon=(\Request::get('jabatan_pemohon'));
			$formulir->alamat_pemohon=(\Request::get('alamat_pemohon'));
			$formulir->lokasi_kampung_lahan=(\Request::get('lokasi_kampung_lahan'));
			$formulir->lokasi_kelurahan_lahan=(\Request::get('lokasi_kelurahan_lahan'));
			$formulir->lokasi_kecamatan_lahan=(\Request::get('lokasi_kecamatan_lahan'));
			$formulir->status_lahan=(\Request::get('status_lahan'));
			$formulir->nomor_surat_kepemilikan=(\Request::get('nomor_surat_kepemilikan'));
			$formulir->luas_tanah=(\Request::get('luas_tanah'));
			$formulir->nama_pemilik_lahan=(\Request::get('nama_pemilik_lahan'));
			$formulir->jumlah_lantai_bangunan=(\Request::get('jumlah_lantai_bangunan'));
			$formulir->luas_lantai_dasar=(\Request::get('luas_lantai_dasar'));
			$formulir->luas_lantai_atas=(\Request::get('luas_lantai_atas'));
			$formulir->luas_bangunan_pelengkap=(\Request::get('luas_bangunan_pelengkap'));
			$formulir->jumlah_luas_bangunan=(\Request::get('jumlah_luas_bangunan'));
			$formulir->rencana_fungsi_bangunan=(\Request::get('rencana_fungsi_bangunan'));
			$formulir->save();
		} else
		if($str == "iui"){
			$formulir =  FormulirIUI::find($id);
			$formulir->nama_pemohon=(\Request::get('nama_pemohon'));
			$formulir->alamat_pemohon=(\Request::get('alamat_pemohon'));
			$formulir->nomor_telepon_pemohon=(\Request::get('nomor_telepon_pemohon'));
			$formulir->nama_perusahaan=(\Request::get('nama_perusahaan'));
			$formulir->alamat_perusahaan=(\Request::get('alamat_perusahaan'));
			$formulir->nomor_telepon_perusahaan=(\Request::get('nomor_telepon_perusahaan'));
			$formulir->npwp=(\Request::get('npwp'));
			$formulir->nama_pemilik=(\Request::get('nama_pemilik'));
			$formulir->alamat_pemilik=(\Request::get('alamat_pemilik'));
			$formulir->no_telepon_pemilik=(\Request::get('no_telepon_pemilik'));
			$formulir->lokasi_kelurahan_pabrik=(\Request::get('lokasi_kelurahan_pabrik'));
			$formulir->lokasi_kecamatan_pabrik=(\Request::get('lokasi_kecamatan_pabrik'));
			$formulir->lokasi_kabupaten_pabrik=(\Request::get('lokasi_kabupaten_pabrik'));
			$formulir->kepemilikan_pabrik=(\Request::get('kepemilikan_pabrik'));
			$formulir->luas_bangunan_pabrik=(\Request::get('luas_bangunan_pabrik'));
			$formulir->luas_tanah_pabrik=(\Request::get('luas_tanah_pabrik'));
			$formulir->alat_utama_produksi=(\Request::get('alat_utama_produksi'));
			$formulir->alat_pembantu_produksi=(\Request::get('alat_pembantu_produksi'));
			$formulir->tenaga_penggerak=(\Request::get('tenaga_penggerak'));
			$formulir->jenis_industri=(\Request::get('jenis_industri'));
			$formulir->komoditi=(\Request::get('komoditi'));
			$formulir->kapasita_terpasang_per_tahun=(\Request::get('kapasita_terpasang_per_tahun'));
			$formulir->kebutuhan_bahan_baku=(\Request::get('kebutuhan_bahan_baku'));
			$formulir->jumlah_tenaga_kerja_pribumi_lk=(\Request::get('jumlah_tenaga_kerja_pribumi_lk'));
			$formulir->jumlah_tenaga_kerja_pribumi_pr=(\Request::get('jumlah_tenaga_kerja_pribumi_pr'));
			$formulir->jumlah_tenaga_kerja_asing_lk=(\Request::get('jumlah_tenaga_kerja_asing_lk'));
			$formulir->jumlah_tenaga_kerja_asing_pr=(\Request::get('jumlah_tenaga_kerja_asing_pr'));
			$formulir->nilai_investasi=(\Request::get('nilai_investasi'));
			$formulir->merek=(\Request::get('merek'));
			$formulir->save();
		}
		$url = "../../listformulir";
		$str = "Berhasil Mengedit Formulir";
		return view(".../status.success",compact("str"),compact('url'));
	}


	public function showListFormulir()
	{
		if(\Session::has('id')){
			if(\Session::get('peran')==3){
				//user
				$arrayFormulir = DB::table('perizinan')
				->where('id_pemohon', \Session::get('id'))
				->whereNotIn('status', array("Dibatalkan"))
				->whereNotIn('disembunyikan', array("true"))
				->orderBy('updated_at','desc')
				->get();

				DB::table('perizinan')
				->where('id_pemohon', \Session::get('id'))
				->update(array('updated' =>'false'));

			}else if (\Session::get('peran')==2){
	        	//tim bppt
				$arrayFormulir = DB::table('perizinan')
				->whereNotIn('status', array('Terverifikasi','Disetujui (Sudah Lengkap)','Disahkan'))
				->where('deleted', 'false')
				->orderBy('updated_at','desc')
				->get();

				DB::table('perizinan')
				->whereNotIn('status', array('Terverifikasi','Disetujui (Sudah Lengkap)'))
				->update(array('updated_by_user' =>'false','updated_by_mayor' =>'false'));
			}else if (\Session::get('peran')==1){
	        	//mayor
				$arrayFormulir = DB::table('perizinan')
				->whereNotIn('status', array('Tertunda','Disetujui (Belum Lengkap)', 'Dibatalkan', 'Ditolak','Disahkan'))
				->orderBy('updated_at','desc')
				->get();

				DB::table('perizinan')
				->whereNotIn('status', array('Tertunda','Disetujui (Belum Lengkap)', 'Dibatalkan', 'Ditolak'))
				->update(array('updated_by_bppt' =>'false'));

			}
			return view('listformulir',compact('arrayFormulir'));
		}else{
			$url = "login";
			$str = "Anda harus login untuk mengakses halaman ini";
			return view("status.failed",compact("str"),compact('url'));
		}
	}
	public function showListIzinDiterbitkan($str)
	{
		if($str!="semua"){
			$arrayFormulir = DB::table('perizinan')
			->whereIn('status', array("Disahkan"))
			->where('jenis_izin',$str)
			->orderBy('updated_at','desc')
			->get();
		}else{
			$arrayFormulir = DB::table('perizinan')
			->whereIn('status', array("Disahkan"))
			->orderBy('updated_at','desc')
			->get();
		}
		return view('listizindisahkan',compact('arrayFormulir'),compact('str'));
	}


	public function uploadDokumenAwal($str,$id)
	{
		return view ('upload_awal/'.$str,compact('str','id'));
	}

	public function checkDokumenAwal($str)
	{
		dd(\Request::all());
		return "success";
		return view ('upload_awal/'.$str,compact('str'));
	}

	public function upload($str,$id) {
		$basePath = './dokumen/';
		$index = 1;
		while(\Request::file('dokumen_'.$index)){
			$dokumen = \Request::file("dokumen_".$index);
			$dokumen->move($basePath.$str.'/'.$id.'/', 'dokumen_'.$index.'.'.$dokumen->getClientOriginalExtension());
			$index++;
		}
		//dd(\Request::all());
		\Session::put('uploaded', "true");
		//dd($path);
		//return $nama_gambar;
		//dd(\Request::all());
		$url = "../../listformulir";
		$str = "Berhasil Mengunggah Dokumen";
		return view(".../status.success",compact("str"),compact('url'));
	}

	public function showDetailFormulir($str,$id)
	{
		if(\Session::get('peran')==3){
			DB::table('perizinan')
			->where('jenis_izin', $str)
			->where('id_izin',$id)
			->update(array('updated' =>'false'));
		}

		if(\Session::get('peran')==2){
			DB::table('perizinan')
			->where('jenis_izin', $str)
			->where('id_izin',$id)
			->update(array('updated_by_user' =>'false','updated_by_mayor' =>'false'));
		}

		if(\Session::get('peran')==1){
			DB::table('perizinan')
			->where('jenis_izin', $str)
			->where('id_izin',$id)
			->update(array('updated_by_bppt' =>'false'));
		}
		switch($str){
			case "ilo":
			$formulir = FormulirILO:: find($id);
			break;
			case "imb":
			$formulir =  FormulirIMB:: find($id);
			break;
			case "iui":
			$formulir =  FormulirIUI:: find($id);
			break;
			case "siup":
			$formulir =  FormulirSIUP:: find($id);
			break;
			case "ho":
			$formulir =  FormulirHO:: find($id);
			break;

		}
		$perizinan = Perizinan::where('id_izin',$id)
		->where('jenis_izin', $str)
		->first();
		$pemohon = User::find($perizinan->id_pemohon);
		$dokumens = \File::files(public_path()."/dokumen/".$str."/".$id."/");
		if($dokumens){
			for($i=0; $i<count($dokumens); $i++){
				$dokumen = pathinfo($dokumens[$i]);
				$dokumens[$i] = "/dokumen/".$str."/".$id."/".$dokumen['filename'].".".$dokumen['extension'];
			}
		}
		//return dd($dokumens);
		return view('detailformulir.'.$str,compact('formulir','pemohon','dokumens'));
	}

	public function showEditFormulir($str,$id)
	{
		try{
			$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)->where('id_pemohon',\Session::get('id'))
			->first();

			if($formulir->status=='Disahkan'){
				$str = "Anda tidak diizinkan untuk mengedit perizinan ini";
				$url = "../../listformulir";
				return view("status.failed",compact("str"),compact('url'));
			}
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengedit perizinan ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
		switch($str){
			case "ilo":
			$formulir = FormulirILO:: find($id);
			break;
			case "imb":
			$formulir =  FormulirIMB:: find($id);
			break;
			case "iui":
			$formulir =  FormulirIUI:: find($id);
			break;
			case "siup":
			$formulir =  FormulirSIUP:: find($id);
			break;
			case "ho":
			$formulir =  FormulirHO:: find($id);
			break;

		}
		return view('editformulir.'.$str,compact('formulir'));
	}


	public function showDeleteFormulir($str,$id)
	{
		try{
			if(\Session::get('peran')==3){

				$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)
				->first();
				if($formulir->status == 'Ditolak'){
					if($formulir->deleted == 'true'){
						$formulir->delete();
						DB::table('perizinan_'.$str.'')
						->where('id',$id)
						->delete();
						$str = "Berhasil Menghapus Formulir Perizinan";
					}else{
						$formulir->touch();
						$formulir->updated_by_user = 'true';
						$formulir->disembunyikan = 'true';
						$formulir->save();
						$str = "Berhasil Menghapus Formulir Perizinan";
					}
				}else{
					$formulir->touch();
					$formulir->updated_by_user = 'true';
					$formulir->status = 'Dibatalkan';
					$formulir->save();
					$str = "Berhasil Membatalkan Formulir Perizinan";
				}


			}else if (\Session::get('peran')==2){
				$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)->first();
				if($formulir->status=='Dibatalkan' || $formulir->disembunyikan=='true' ){
					DB::table('perizinan')
					->where('jenis_izin', $str)
					->where('id_izin', $id)
					->delete();
					DB::table('perizinan_'.$str.'')
					->where('id',$id)
					->delete();
				}else if ($formulir->status=='Ditolak'){
					$formulir->deleted = 'true';
					$formulir->save();
				}
				$str = "Berhasil Menghapus Formulir Perizinan";
			}
			$url = "../../listformulir";
			return view("/status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk menghapus perizinan ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}

	public function showMenyembunyikanFormulir($str,$id)
	{
		try{
			$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)
			->first();
			$formulir->disembunyikan = 'true';
			$formulir->save();

			$str = "Anda berhasil menyembunyikan izin ini dari daftar formulir";
			$url = "../../listformulir";
			return view("status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda gagal menyembunyikan izin ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}
	public function showVerifikasiFormulir($str,$id)
	{
		try{
			if (\Session::get('peran')==2){
				$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)
				->first();
				$formulir->touch();
				$formulir->updated = 'true';
				$formulir->updated_by_bppt = 'true';
				$formulir->status = 'Terverifikasi';
				$formulir->save();

				$str = "Berhasil Memverifikasi Formulir Perizinan";
			}
			$url = "../../listformulir";
			return view("/status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengakses halaman ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}

	public function showVerifikasiFormulirLengkap($str,$id)
	{
		try{
			if (\Session::get('peran')==2){
				$formulir = Perizinan::where('id_izin','=',$id)->where('jenis_izin',$str)
				->first();
				$formulir->touch();
				$formulir->updated = 'true';
				$formulir->updated_by_bppt = 'true';
				$formulir->status = 'Disetujui (Sudah Lengkap)';
				$formulir->save();
				$str = "Berhasil Memverifikasi Kelengkapan Formulir Perizinan";
			}
			$url = "../../listformulir";
			return view("/status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengakses halaman ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}
	public function showMenyetujuiFormulir($str,$id)
	{

		try{
			if (\Session::get('peran')==1){
				$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)
				->first();
				$formulir->touch();
				$formulir->updated = 'true';
				$formulir->updated_by_mayor = 'true';
				$formulir->status = 'Disetujui (Belum Lengkap)';
				$formulir->save();
				$str = "Berhasil Menyetujui Formulir Perizinan";
			}
			$url = "../../listformulir";
			return view("/status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengakses halaman ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}

	public function showMenerbitkanFormulir($str,$id)
	{

		try{
			if (\Session::get('peran')==1){
				$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)
				->first();
				$formulir->touch();
				$formulir->updated_by_mayor = 'true';
				$formulir->updated = 'true';
				$formulir->status = 'Disahkan';
				$formulir->save();

				$formulir = DB::table('perizinan');
				$str = "Berhasil Mengesahkan Perizinan";
			}
			$url = "../../listformulir";
			return view("/status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengakses halaman ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}

	public function showMenolakFormulir($str,$id)
	{

		try{
			$formulir = Perizinan::where('id_izin',$id)->where('jenis_izin',$str)
			->first();
			$formulir->touch();
			$formulir->updated = 'true';
			if (\Session::get('peran')==1){
				$formulir->updated_by_mayor = 'true';
			} else if (\Session::get('peran')==2){
				$formulir->updated_by_bppt = 'true';
			}
			$str = "Berhasil Menolak Perizinan";
			$formulir->status = 'Ditolak';
			$formulir->save();
			$url = "../../listformulir";
			return view("/status.success",compact("str"),compact('url'));
		} catch (\Exception $e) {
			$str = "Anda tidak diizinkan untuk mengakses halaman ini";
			$url = "../../listformulir";
			return view("status.failed",compact("str"),compact('url'));
		}
	}
}
// ==============================================
