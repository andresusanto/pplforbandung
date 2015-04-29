<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KartuTandaPenduduk;
use App\Penduduk;
use Request;

use App\OAuthAccessToken;

class PendudukController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array();
		try {
			$code = explode(" ", Request::header('Authorization'));
			if ($code[0] !== 'Bearer')
				App::abort(401, 'Not authenticated');
			$ktp = OAuthAccessToken::findOrFail($code[1])->session->user->ktp;
			$penduduk = $ktp->penduduk;
			$kartuKeluarga = $penduduk->kartuKeluarga()->orderBy('created_at', 'desc')->first();
			$data = array();
			$data['id'] = $ktp['id'];
			$data['nama_penduduk'] = $penduduk['nama'];
			$data['alamat_penduduk'] = $kartuKeluarga['alamat'];
			$data['tgl_lahir'] = $penduduk['waktuLahir'];
			$data['tempat_lahir'] = $penduduk['tempatLahir'];
		} catch (ModelNotFoundException $e) {
			App::abort(401, 'Not authenticated');
		} catch (Exception $e) {
			$data = ['status' => 'error', 'description' => 'server error'];
		}
		return response()->json($data);
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
		$data = array();
		try {
			$ktp = KartuTandaPenduduk::findOrFail($id);
			$penduduk = $ktp->penduduk;
			$kartuKeluarga = $penduduk->kartuKeluarga()->orderBy('created_at', 'desc')->first();
			$data = array();
			$data['id'] = $ktp['id'];
			$data['nama_penduduk'] = $penduduk['nama'];
			$data['alamat_penduduk'] = $kartuKeluarga['alamat'];
			$data['tgl_lahir'] = $penduduk['waktuLahir'];
			$data['tempat_lahir'] = $penduduk['tempatLahir'];
		} catch (ModelNotFoundException $e) {
			App::abort(401, 'Not authenticated');
		} catch (Exception $e) {
			$data = ['status' => 'error', 'description' => 'server error'];
		}
		return response()->json($data);
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

}
