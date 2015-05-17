<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\BayarPajak;

class BayarPajakController extends Controller {

	public function prosesPembayaran()
	{
		$input = Input::all();
		BayarPajak::create($input);

		return Redirect::to('/pembayaran');
	}

	public function daftarBukti()
	{
		// dummy
		$npwpd = '32445688474536';

		$sql = "npwpd like '$npwpd'";
		$listBukti = BayarPajak::select('id', 'jenis_pajak', 'nomor_stp', 'tanggal_pembayaran')
			->whereRaw($sql)->get();

		$data = array(
			'npwpd' => $npwpd,
			'daftarBukti' => $listBukti
		);

		return view('pembayaran.daftarBukti')->with($data);
	}

	public function getBukti($id)
	{
		$sql = "id = $id";
		$bukti = BayarPajak::select('npwpd', 'jenis_pajak', 'masa_pajak', 'nomor_stp', 
				'jumlah_pembayaran', 'status_pembayaran', 'tanggal_pembayaran')
				->whereRaw($sql)->get();

		$data = array('bukti'=>$bukti[0]);
		return view('pembayaran.bukti')->with($data);
	}
}
