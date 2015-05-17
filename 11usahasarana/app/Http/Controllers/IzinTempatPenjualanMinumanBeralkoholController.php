<?php namespace App\Http\Controllers;

use App\Izin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\SendMail;

use App\IzinTempatPenjualanMinumanBeralkohol;
use DateTime;
use Illuminate\Http\Request;
use Redirect;
use DB;

class IzinTempatPenjualanMinumanBeralkoholController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function user()
	{
		return view('izin.user.minumanberalkohol');
	}
	
	public function admin() 
	{
		$izin = Izin::where('JenisIzin','=','ITPMB')->get();
		return view('izin.admin.minumanberalkohol', compact('izin'));
	}
	
	public function updateStatus($id,$status){
		
		Izin::where('id', $id)->update(['StatusIzin' => $status]);
        if($status === 'Disetujui')
        {
			SendMail::sendMail();
            $time = date('Y-m-d', strtotime('+2 years'));
            DB::table('izin')->where('id',$id)->update(['BerlakuSampai' => $time, 'TanggalDisetujui' => new \DateTime]);
        }
		return Redirect::to('Admin/izin/IzinTempatPenjualanMinumanBeralkohol')->with('message', 'Status updated.');
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
	public function store(Request $request)
	{
        $namaPerusahaan = $request->get('nama_perusahaan');
        $alamatPerusahaan = $request->get('alamat_perusahaan');
        $namaUsaha = $request->get('nama_usaha');
        $lokasiUsaha = $request->get('lokasi_usaha');

		$KTPFile = $request->file('KTPFile');
		$AktaPendirian = $request->get('AktaPendirianPerusahaan');
		$SuratIzinPerdaganganFile = $request->file('SuratIzinPerdaganganFile');
		$SuratIzinUsahaKepariwisataanFile = $request->file('SuratIzinUsahaKepariwisataanFile');
		$SuratKepemilikanTempatFile = $request->file('SuratKepemilikanTempatFile');
		$TandaDaftarPerusahaanFile = $request->file('TandaDaftarPerusahaanFile');
		$IzinGangguan = $request->get('NomorSuratIzinGangguan');
		$NPWP = $request->get('NPWP');
		$JenisAlkohol = $request->input('JenisAlkohol');

		/* Get maximum ID from table Izin */
		$id = DB::table('izin')->max('id');

		/* Get ID for the new izin entry */
		$id = $id + 1;

		/* Get current timestamp */
		$date = new DateTime;

        $json = DB::table('pengguna')->where('id',1)->first();
        $nama = $json->nama;

        /* Insert izin to table Izin */
		DB::table('izin')->insert(
			[
			'id' => $id, 
			'NamaPemohon' => $nama,
            'AlamatPerusahaan' => $alamatPerusahaan,
            'NamaPerusahaan'  => $namaPerusahaan,
            'NamaUsaha' => $namaUsaha,
            'LokasiUsaha'  => $lokasiUsaha,
			'JenisIzin' => 'ITPMB',
			'TanggalMasuk' => $date, 
			'BerlakuSampai' => $date, 
			'StatusIzin' => 'Diterima',
			'DokumenPersetujuan' => '-', 
			'created_at' => $date, 
			'updated_at' => $date
			]
		);

		/* Destination Path */
		$DestinationPath = public_path().'/File/Izin/ITPMB/'.$id.'/';

		/* Get each document file name */
		$KTPFileName = $KTPFile->getClientOriginalName();
		$SuratIzinPerdaganganFileName = $SuratIzinPerdaganganFile->getClientOriginalName();
		$SuratIzinUsahaKepariwisataanFileName = $SuratIzinUsahaKepariwisataanFile->getClientOriginalName();
		$SuratKepemilikanTempatFileName = $SuratKepemilikanTempatFile->getClientOriginalName();
		$TandaDaftarPerusahaanFileName = $TandaDaftarPerusahaanFile->getClientOriginalName();

		/* Move each uploaded files to destination path */
		$KTPFile->move($DestinationPath, $KTPFileName);
		$SuratIzinPerdaganganFile->move($DestinationPath, $SuratIzinPerdaganganFileName);
		$SuratIzinUsahaKepariwisataanFile->move($DestinationPath, $SuratIzinUsahaKepariwisataanFileName);
		$SuratKepemilikanTempatFile->move($DestinationPath, $SuratKepemilikanTempatFileName);
		$TandaDaftarPerusahaanFile->move($DestinationPath, $TandaDaftarPerusahaanFileName);

		/* Insert izin to table IzinUsahaPusatPerbelanjaan */
		DB::table('izintempatpenjualanminumanberalkohol')->insert(
			[
			'idIzin' => $id,
			'IzinusahaKepariwisataan' => $DestinationPath.$SuratIzinUsahaKepariwisataanFileName,
			'NPWP' =>$NPWP,
			'JenisMinumanBeralkohol' => $JenisAlkohol,
			'KTPPimpinan' => $DestinationPath.$KTPFileName,
			'AktaPendirianPerusahaan' => $AktaPendirian,
			'IzinusahaPerdagangan' => $DestinationPath.$SuratIzinPerdaganganFileName,
			'TandaDaftarPerusahaan' => $DestinationPath.$TandaDaftarPerusahaanFileName,
			'IzinGangguan' => $IzinGangguan,
			'KepemilikanTempat' => $DestinationPath.$SuratKepemilikanTempatFileName,
			]
		);
        $message = 'Data berhasil disimpan';
		return view('izin.user.result',compact('message'));
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

    public function downloadFile($id) {
        $downloadLink = array();
        $statusIzin = array();
        $judul = "Izin Tempat Penjualan Minuman Beralkohol";
        $back = "IzinTempatPenjualanMinumanBeralkohol";
        $izin = IzinTempatPenjualanMinumanBeralkohol::where('idIzin','=',$id)->first();

        if ($izin != null) {
            $downloadLink['Izin Usaha Kepariwisataan'] = $izin->IzinUsahaKepariwisataan;
            $downloadLink['KTP Pimpinan'] = $izin->KTPPimpinan;
            $downloadLink['Izin Usaha Perdagangan'] = $izin->IzinUsahaPerdagangan;
            $downloadLink['Tanda Daftar Perusahaan'] = $izin->TandaDaftarPerusahaan;
            $downloadLink['Kepemilikan Tempat'] = $izin->KepemilikanTempat;

            $statusIzin['NPWP'] = $izin->StatusNPWP;
            $statusIzin['Akta Pendirian Perusahaan'] = $izin->StatusAktaPendirianPerusahaan;
            $statusIzin['Izin Gangguan'] = $izin->StatusIzinGangguan;

            return view('izin.admin.tokomodern',compact('downloadLink','statusIzin','back','judul'));
        }
        else {
            $izin = Izin::where('JenisIzin','=','ITPMB')->get();
            return view('izin.admin.tokomodern', compact('izin'));
        }
    }
}
