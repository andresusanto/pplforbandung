<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PendaftarWP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PendaftarWPController extends Controller {

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
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function daftar(Request $request)
    {
        $pendaftar = new PendaftarWP();

        $pendaftar->nama = $request->input('nama');
        $pendaftar->nik = $request->input('nik');
        $pendaftar->tempat_lahir = $request->input('tempatLahir');
        $pendaftar->tanggal_lahir = date('Y-m-d',strtotime($request->input('tanggalLahir')));
        $pendaftar->alamat = $request->input('alamat');
        $pendaftar->status_pendaftaran = -1;
        $pendaftar->save();
        return Redirect::to('/');
    }

}
