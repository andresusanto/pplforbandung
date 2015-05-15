<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

use App\Models\Status;
use Validator;
use DB;

class StatusController extends Controller {

	public function getIndex()
	{
		$list_status = Status::paginate(10);
		return view('izin.status.index',[
			'list_status'=>$list_status,
		]);
	}

	//tampilkan form create
	public function getCreate()
	{
		//standarnya bikin objek baru aja trus render
		$status = new Status();
		return view('izin.status.create',['status'=>$status]);
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
		$validator = Validator::make($data,Status::$rules);
		$status = new Status();
		$status->nama = $data['nama'];

		//gagal
		if ($validator->fails()){
			//tampilin form login sama errornya
			return view('izin.status.create',['status'=>$status,'errors'=>$validator->errors()]);
		} else { //berhasil
			//simpen data
			//bawaan Eloquent ORM
			$status->save();
			return redirect()->route('izin.status.index');
		}
	}

	public function getUpdate($id)
	{
		$status = Status::findOrFail($id);
		return view('izin.status.update',['status'=>$status]);
	}

	public function postUpdate($id)
	{
		//cara lebih males
		$data = Request::except('_token');
		$validator = Validator::make($data,Status::$rules);
		$status = Status::findOrFail($id);
		$status->fill($data);
		if ($validator->fails()){
			return view('izin.status.update',['status'=>$status,'errors'=>$validator->errors()]);
		} else {
			$status->save();
			return redirect()->route('izin.status.index');
		}
	}

	public function getRead($id)
	{
		$status = Status::findOrFail($id);
		return view('izin.status.read',['status'=>$status]);
	}

	public function getDelete($id)
	{
		$status = Status::findOrFail($id);
		$status->delete();
		return redirect()->route('izin.status.index');
	}

}
