<?php namespace App\Http\Controllers;

use App\Izin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\SendMail;


use App\IzinUsahaPusatPerbelanjaan;
use Illuminate\Http\Request;
use Redirect;
use DB;

class IzinUsahaPusatPerbelanjaanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function user()
	{
		return view('izin.user.pusatperbelanjaan');
	}
	
	public function admin() 
	{
		$izin = Izin::where('JenisIzin','=','IUPP')->get();
		return view('izin.admin.pusatperbelanjaan', compact('izin'));
	}
	
	public function updateStatus($id,$status){
		Izin::where('id', $id)->update(['StatusIzin' => $status]);
        if($status === 'Disetujui')
        {
			SendMail::sendMail();
            $time = date('Y-m-d', strtotime('+5 years'));
            DB::table('izin')->where('id',$id)->update(['BerlakuSampai' => $time, 'TanggalDisetujui' => new \DateTime]);
        }
		return Redirect::to('Admin/izin/IzinUsahaPusatPerbelanjaan')->with('message', 'Status updated.');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $alamatPerusahaan = $request->get('alamat_perusahaan');
        $namaPerusahaan = $request->get('nama_perusahaan');
        $namaUsaha = $request->get('nama_usaha');
        $lokasiUsaha = $request->get('lokasi_usaha');
        $kegiatanUsaha = $request->get('KegiatanUsaha');

		/* Get uploaded file from user */
		$KTPPimpinan = $request->file('KTPFile');
		$PasFoto = $request->file('PasfotoFile');
		$SuratIzinGangguan = $request->get('SuratIzinGangguanFile');
		$SuratKepemilikanTempat = $request->file('SuratKepemilikanTempatFile');
		$AktaPendirian = $request->get('AktaPendirianFile');
		$FotokopiPengesahanKehakiman = $request->file('PengesahanKehakimanFile');
		$DomisiliPerusahaan = $request->file('DomisiliPerusahaanFile');
		$BKPM = $request->file('BKPMFile');
		$NeracaModal = $request->file('NeracaModalFile');
		$IMB = $request->get('IMBFile');
		$SuratKeteranganLokasi = $request->file('SuratKeteranganLokasiFile');
		$NPWP = $request->get('NPWPFile');
		$PBB = $request->get('PBBFile');
		$AnalisaDampak = $request->file('AnalisaDampakFile');
		$RencanaKemitraan = $request->file('RencanaKemitraanFile');
		$SuratPernyataanKebenaran = $request->file('SuratPernyataanKebenaranFile');

		/* Get maximum ID from table Izin */
		$id = DB::table('izin')->max('id');

		/* Get ID for the new izin entry */
		$id = $id + 1;

		/* Get current timestamp */
		$date = new \DateTime;

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
            'KegiatanUsaha' => $kegiatanUsaha,
			'JenisIzin' => 'IUPP', 
			'TanggalMasuk' => $date, 
			'BerlakuSampai' => $date, 
			'StatusIzin' => 'Diterima', 
			'DokumenPersetujuan' => '-', 
			'created_at' => $date, 
			'updated_at' => $date
			]
		);

		/* Destination Path */
		$DestinationPath = public_path().'/File/Izin/IUPP/'.$id.'/';

		/* Get each document file name */
		$KTPPimpinanFileName = $KTPPimpinan->getClientOriginalName();
		$PasFotoFileName = $PasFoto->getClientOriginalName();
		$SuratKepemilikanTempatFileName = $SuratKepemilikanTempat->getClientOriginalName();
		$FotokopiPengesahanKehakimanFileName = $FotokopiPengesahanKehakiman->getClientOriginalName();
		$DomisiliPerusahaanFileName = $DomisiliPerusahaan->getClientOriginalName();
		$BKPMFileName = $BKPM->getClientOriginalName();
		$NeracaModalFileName = $NeracaModal->getClientOriginalName();
		$SuratKeteranganLokasiFileName = $SuratKeteranganLokasi->getClientOriginalName();
		$AnalisaDampakFileName = $AnalisaDampak->getClientOriginalName();
		$RencanaKemitraanFileName = $RencanaKemitraan->getClientOriginalName();
		$SuratPernyataanKebenaranFileName = $SuratPernyataanKebenaran->getClientOriginalName();

		/* Move each uploaded files to destination path */
		$KTPPimpinan->move($DestinationPath, $KTPPimpinanFileName);
		$PasFoto->move($DestinationPath, $PasFotoFileName);
		$SuratKepemilikanTempat->move($DestinationPath, $SuratKepemilikanTempatFileName);
		$FotokopiPengesahanKehakiman->move($DestinationPath, $FotokopiPengesahanKehakimanFileName);
		$DomisiliPerusahaan->move($DestinationPath, $DomisiliPerusahaanFileName);
		$BKPM->move($DestinationPath, $BKPMFileName);
		$NeracaModal->move($DestinationPath, $NeracaModalFileName);
		$SuratKeteranganLokasi->move($DestinationPath, $SuratKeteranganLokasiFileName);
		$AnalisaDampak->move($DestinationPath, $AnalisaDampakFileName);
		$RencanaKemitraan->move($DestinationPath, $RencanaKemitraanFileName);
		$SuratPernyataanKebenaran->move($DestinationPath, $SuratPernyataanKebenaranFileName);

		/* Insert izin to table IzinUsahaPusatPerbelanjaan */
		DB::table('izinusahapusatperbelanjaan')->insert(
			[
			'idIzin' => $id, 
			'PengesahanKehakiman' => $DestinationPath.$FotokopiPengesahanKehakimanFileName,
			'AktaPendirianPerusahaan' => $AktaPendirian,
			'SuratKepemilikanTempat' => $DestinationPath.$SuratKepemilikanTempatFileName,
			'IzinGangguan' => $SuratIzinGangguan,
			'PasFoto' => $DestinationPath.$PasFotoFileName,
			'SuratPernyataanKebenaran' => $DestinationPath.$SuratPernyataanKebenaranFileName,
			'KemitraanUMKM' => $DestinationPath.$RencanaKemitraanFileName,
			'AnalisaDampakLingkungan' => $DestinationPath.$AnalisaDampakFileName,
			'SuratKeteranganLokasi' => $DestinationPath.$SuratKeteranganLokasiFileName,
			'KTPPimpinan' => $DestinationPath.$KTPPimpinanFileName,
			'NPWP' => $NPWP,
			'BuktiPelunasanPBB' => $PBB,
			'IMB' => $IMB,
			'SuratIzinBKPM' => $DestinationPath.$BKPMFileName,
			'NeracaModalPerusahaan' => $DestinationPath.$NeracaModalFileName,
			'DomisiliPerusahaan' => $DestinationPath.$DomisiliPerusahaanFileName
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
        $judul = "Izin Usaha Pusat Perbelanjaan";
        $back = "IzinUsahaPusatPerbelanjaan";
        $izin = IzinUsahaPusatPerbelanjaan::where('idIzin','=',$id)->first();

        if ($izin != null) {
            $downloadLink['Pengesahan Kehakiman'] = $izin->PengesahanKehakiman;
            $downloadLink['Surat Kepemilikan Tempat'] = $izin->SuratKepemilikanTempat;
            $downloadLink['Pas Foto'] = $izin->PasFoto;
            $downloadLink['Surat Pernyataan Kebenaran'] = $izin->SuratPernyataanKebenaran;
            $downloadLink['Kemitraan UMKM'] = $izin->KemitraanUMKM;
            $downloadLink['Analisa Dampak Lingkungan'] = $izin->AnalisaDampakLingkungan;
            $downloadLink['Surat Keterangan Lokasi'] = $izin->SuratKeteranganLokasi;
            $downloadLink['KTP Pimpinan'] = $izin->KTPPimpinan;
            $downloadLink['Surat Izin BKPM'] = $izin->SuratIzinBKPM;
            $downloadLink['Neraca Modal Perusahaan'] = $izin->NeracaModalPerusahaan;
            $downloadLink['Domisili Perusahaan'] = $izin->DomisiliPerusahaan;

            $statusIzin['Akta Pendirian Perusahaan'] = $izin->StatusAktaPendirianPerusahaan;
            $statusIzin['Izin Gangguan'] = $izin->StatusIzinGangguan;
            $statusIzin['NPWP'] = $izin->StatusNPWP;
            $statusIzin['Pelunasan PBB'] = $izin->StatusPelunasanPBB;
            $statusIzin['IMB'] = $izin->StatusIMB;

            return view('izin.admin.tokomodern',compact('downloadLink','statusIzin', 'judul', 'back'));
        }
        else {
            $izin = Izin::where('JenisIzin','=','IUPP')->get();
            return view('izin.admin.tokomodern', compact('izin'));
        }
    }

}
