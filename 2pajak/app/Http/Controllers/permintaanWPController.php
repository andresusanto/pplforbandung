<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\permintaanWP;

class permintaanWPController extends Controller {

	public function prosesPermintaan()
	{
		$input = Input::all();
		permintaanWP::create($input);
		$message = array('message'=> 'Permintaan pengajuan berhasil dikirim');

		//return Redirect::back()->with(compact($message));
		return Redirect::to('/permintaan');
	}

	public function daftarPermintaan()
	{
		// dummy
		$npwpd = '32445688474536';

		$sql = "npwpd like '$npwpd' and kategori_permintaan like 'keberatan pajak'";
		$keberatanPajak = permintaanWP::select('jenis_pajak', 'tahun_pajak', 'harga_pajak_seharusnya', 'alasan_pengaduan', 'status_permintaan')
			->whereRaw($sql)->get();

		$sql = "npwpd like '$npwpd' and kategori_permintaan like 'pencabutan wp'";
		$pencabutanWP = permintaanWP::select('alasan_penghapusan', 'status_permintaan')
			->whereRaw($sql)->get();

		$sql = "npwpd like '$npwpd' and kategori_permintaan like 'pengurangan sanksi'";
		$penguranganSanksi = permintaanWP::select('jenis_sanksi','nomor_stp','jumlah_sanksi', 'alasan_permohonan', 'status_permintaan')
			->whereRaw($sql)->get();

		$data = array(
			'keberatanPajak'=>$keberatanPajak,
			'pencabutanWP'=>$pencabutanWP,
			'penguranganSanksi'=>$penguranganSanksi
			);

		return view('permintaanWP.daftarPermintaan')->with($data);
	}

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

}
