<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use App\Models\Izin;
use App\Models\JenisIzin;
use App\Models\Dokumen;
use App\Models\StatusIzin;
use App\Models\Status;
use Input;
use Auth;
use DB;
use Session;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
class PenggunaController extends Controller {
	public function __construct(){
		$this->middleware('auth');
	}

	//daftar izin dari pengguna
	public function getIndex()
	{
		$listIzin = Izin::where('pengguna_id',Auth::user()->id)->orderBy('tanggal_pengajuan','desc')->orderBy('updated_by_admin','desc')->get();
		return view('izin.pengguna.index',compact('listIzin'));
	}

	//bikin izin baru
	public function getCreate()
	{
		$list_jenisizin = JenisIzin::with('templates')->get();
		return view('izin.pengguna.create',[
			'izin'=>new Izin(),
			'list_jenisizin' => $list_jenisizin,
		]);
	}

	public function postCreate()
	{
		$izin = new Izin();
		$izin->jenisizin_id = Request::input('jenisizin_id');
		$izin->pengguna_id = Auth::user()->id;
		$izin->tanggal_pengajuan = date("Y-m-d");
		$izin->nama_perusahaan = Request::input('nama_perusahaan');
		$izin->alamat_perusahaan = Request::input('alamat_perusahaan');
		$izin->alamat_garasi = Request::input('alamat_garasi');
		$izin->npwp = Request::input('npwp');
		$validator = Validator::make(Request::all(),Izin::$rules);
		if (!$validator->fails()){
			$izin->save();
			Event::fire('izin.updated_by_pengguna',[$izin]);

			$statusIzin = new StatusIzin;
			$statusIzin->izin_id = $izin->id;
			$statusIzin->status_id = Status::STATUS_MELENGKAPI_DOKUMEN;
			$statusIzin->timestamp = date("Y-m-d H:i:s");
			$statusIzin->save();

			Session::flash('notif-success',"Izin berhasil diajukan");
			return redirect()->route('izin.pengguna.read',['id'=>$izin->id]);
		} else {
			$list_jenisizin = JenisIzin::with('templates')->get();
			$errors = $validator->errors();
			return view('izin.pengguna.create',compact('list_jenisizin','izin','errors'));
		}
		
	}

	public function getRead($id)
	{
		$izin = Izin::findOrFail($id);
		$izin->readedByPengguna();

		$templates = $izin->jenisIzin->templates;
		//generate dokumen
		foreach ($templates as $template) {
			if (Dokumen::where('izin_id','=',$id)->where('template_id','=',$template->id)->first()==null){
				$dokumen = new Dokumen();
				$dokumen->nama = $template->nama;
				$dokumen->izin_id = $id;
				$dokumen->template_id = $template->id;
				$dokumen->save();
				if (!$dokumen->template->butuh_upload){
					$dokumen->status = Dokumen::STATUS_PENDING;
				} else {
					$dokumen->status = Dokumen::STATUS_BELUM;
				}
				$dokumen->save();
			}
		}
		$izin = Izin::where('id','=',$id)->with('dokumens')->first();
		$list_status = $izin->status()->orderBy('timestamp','desc')->get();
		return view('izin.pengguna.read',['izin'=>$izin,'list_status'=>$list_status]);
	}

	public function postUploadDokumen($id,$template_id)
	{

		$izin = Izin::findOrFail($id);
		Event::fire('izin.updated_by_pengguna',[$izin]);

		$filePath = public_path().'/uploads/dokumen/'.$id.'/';
		$file = Input::file('file');
		if (!in_array($file->getClientOriginalExtension(),['png','jpg','pdf'])){
			Session::flash('notif-danger','Ekstensi file harus pdf, jpg atau png');
			return redirect()->route('izin.pengguna.read',['id'=>$id]);
		}
		$file->move($filePath,$template_id.'.'.$file->getClientOriginalExtension());

		$dokumen = Dokumen::where('izin_id',$id)->where('template_id',$template_id)->first();
		$dokumen->url = 'uploads/dokumen/'.$id.'/'.$template_id.'.'.$file->getClientOriginalExtension();
		$dokumen->status = Dokumen::STATUS_PENDING;
		$dokumen->save();

		Session::flash('notif-success','Dokumen berhasil diunggah');
		return redirect()->route('izin.pengguna.read',['id'=>$id]);

	}

	public function getCancel($id)
	{
		$izin = Izin::findOrFail($id);
		Event::fire('izin.updated_by_pengguna',[$izin]);
		DB::table('status_izin')
		->insert(['izin_id'=>$id,'status_id'=>Status::CANCELLED,'timestamp'=>Carbon::now()]);

		Session::flash('notif-success','Izin berhasil dibatalkan');
		return redirect()->route('izin.pengguna.read',['id'=>$id]);
	}

	public function getPerpanjangIzin($id)
	{
		$izin = Izin::findOrFail($id);
		$izin->tanggal_perpanjangan = null;
		Event::fire('izin.updated_by_pengguna',[$izin]);
		$list_dokumen = $izin->dokumens;
		//dd($list_dokumen);
		foreach ($list_dokumen as $dokumen) {
			//dd($dokumen->template);
			if ($dokumen->template->butuh_perpanjangan){
				$dokumen->status = Dokumen::STATUS_BUTUH_PERPANJANGAN;
				//dd($dokumen);
				$dokumen->save();
			}	
		}
		return redirect()->route('izin.pengguna.read',['id'=>$id]);
	}
}
