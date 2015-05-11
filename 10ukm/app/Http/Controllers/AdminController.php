<?php namespace App\Http\Controllers;

use App\Usaha;
use App\Produk;
use App\Notifikasi;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class AdminController extends Controller {

	public function index()
	{
        $usahas=Usaha::all();
        $notifikasis=Notifikasi::all();
		return view('admin.indexAdmin',compact('usahas'),compact('notifikasis'));
	}

    public function show($id)
	{
		$usaha = Usaha::find($id);
		$produks = Produk::where('id_usaha','=',$id)->get();
		return view('admin.dataLengkapAdmin', compact('usaha'), compact('produks'));
	}
    
    public function edit($id)
	{
		$usaha = Usaha::find($id);
		return view('admin.editUKMAdmin', compact('usaha'));
	}
    
    public function update($id)
	{
		$input = Request::all();	
		$usaha = Usaha::find($id);
		// $usaha->nama = $input->nama;
		// $usaha->bidang = $input->bidang;
		// $usaha->lokasi = $input->lokasi;
		// $usaha->telepon = $input->telepon;
		// $usaha->save();
		$usaha->update($input);
		return redirect('admin');
	}

    public function destroy($id)
	{
		$usaha = Usaha::find($id);
		$usaha->delete();
		return redirect('admin');
	}

	public function izin($id)
	{
		$usaha = Usaha::find($id);
		$usaha->statusizin = 1;
		$usaha->save();
		return redirect('admin');
	}
}
