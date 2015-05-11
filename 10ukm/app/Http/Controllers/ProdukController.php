<?php namespace App\Http\Controllers;
use App\Produk;
use App\Usaha;
use App\Notifikasi;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class ProdukController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id_usaha)
	{

		return view('form.form_Produk', compact('id_usaha'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id_usaha)
	{
		$input = Request::all();	

		Produk::create($input);

		$usaha = Usaha::find($id_usaha);
		$inputnotifikasi = array('nama_ukm' => $usaha['nama'],
	    		'konten' => $usaha['nama'] . ' telah menambahkan produk baru !' 
	    	);

	    Notifikasi::create($inputnotifikasi);

		return redirect('daftar-usaha/' . $id_usaha);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$produk = Produk::find($id);
		$produk->status = 1;
		$produk->update();
		return redirect('daftar-usaha');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$produk = Produk::find($id);
		$produk->delete();
		return redirect('daftar-usaha');
	}

}
