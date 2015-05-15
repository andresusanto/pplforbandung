<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// !!! PENTING!!!
// jangan salah import ya
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Models\JenisIzin;
use App\Models\TemplateIzin;
use App\Models\Template;
use Validator;
use DB;

class JenisController extends Controller {

	public function getIndex()
	{
		//query pake eloquent
		$list_jenis_izin = JenisIzin::paginate(10);
		//query pake database
		$listdb_jenis_izin = DB::table('jenisizin')->select('*')->get();
		return view('izin.jenis.index',[
			'list_jenis_izin'=>$list_jenis_izin,
			'listdb_jenis_izin'=>$listdb_jenis_izin,
		]);
	}

	//tampilkan form create
	public function getCreate()
	{
		//standarnya bikin objek baru aja trus render
		$jenis_izin = new JenisIzin;
		return view('izin.jenis.create',['jenis_izin'=>$jenis_izin]);
	}

	//handle hasil form create
	//kalo gagal, pergi ke form trus tampilkan pesan kesalahan
	//kalo berhasil, pergi ke index
	public function postCreate()
	{
		//ambil data dari input
		//kalo yang postUpdate, ambil datanya otomatis.
		$data = [
			'nama' => Request::input('nama')
		];
		$validator = Validator::make($data,JenisIzin::$rules);
		
		$jenis_izin = new JenisIzin();
		$jenis_izin->nama = $data['nama'];

		//gagal
		if ($validator->fails()){
			//tampilin form login sama errornya
			return view('izin.jenis.create',['jenis_izin'=>$jenis_izin,'errors'=>$validator->errors()]);
		} else { //berhasil
			//simpen data
			
			//bawaan Eloquent ORM
			$jenis_izin->save();
			return redirect()->route('izin.jenis.index');
		}
	}

	public function getUpdate($id)
	{
		$jenis_izin = JenisIzin::where('id','=',$id)->with('templates')->firstOrFail();
		return view('izin.jenis.update',['jenis_izin'=>$jenis_izin,
			'list_template'=>Template::all()]);
	}

	public function postUpdate($id)
	{
		//cara lebih males
		$data = Request::except('_token');
		$validator = Validator::make($data,JenisIzin::$rules);
		$jenis_izin = JenisIzin::findOrFail($id);
		$jenis_izin->fill($data);
		if ($validator->fails()){
			return view('izin.jenis.update',['jenis_izin'=>$jenis_izin,'errors'=>$validator->errors()]);
		} else {
			$jenis_izin->save();
			return redirect()->route('izin.jenis.index');
		}
	}

	public function getRead($id)
	{
		$jenis_izin = JenisIzin::where('id','=',$id)->with('templates')->firstOrFail();
		return view('izin.jenis.read',[
			'jenis_izin'=>$jenis_izin,
		]);
	}

	public function getAddTemplate($id,$template_id)
	{
		//biar gak dobel
		$template_izin = TemplateIzin::where('jenisizin_id','=',$id)->where('template_id','=',$template_id)->first();
		if ($template_izin == null){
			DB::table('template_izin')
			->insert(['jenisizin_id'=>$id,'template_id'=>$template_id]);
		}
		return redirect()->route('izin.jenis.update',['id'=>$id]);
	}

	public function getDeleteTemplate($id,$template_id)
	{
		DB::table('template_izin')
			->where('jenisizin_id','=',$id)
			->where('template_id','=',$template_id)
			->delete();
		return redirect()->route('izin.jenis.update',['id'=>$id]);
	}

	public function getDelete($id)
	{
		$jenis_izin = JenisIzin::findOrFail($id);
		$jenis_izin->delete();
		return redirect()->route('izin.jenis.index');
	}

}
