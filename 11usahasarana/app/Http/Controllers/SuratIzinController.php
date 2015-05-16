<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\PDF;
use App;
use App\Izin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Input;
use App\database;
use DB;
use Redirect;
use Response;

class SuratIzinController extends Controller 
{
    public function index(){}

    public function getSuratIzin($id){
        $izin = Izin::where('id','=',$id)->first();

        if ($izin->StatusIzin === 'Disetujui'){
            $pdf = App::make('dompdf');
            $parameter = array();

            if ($izin->JenisIzin === 'IUTM'){
                $parameter['namasurat'] = "Izin Usaha Toko Modern (IUTM)";
                $parameter['kegiatanusaha'] = $izin->KegiatanUsaha;
                $parameter['bidangusaha'] = "Toko modern";
                $parameter['daftarulang'] = "5 (lima)";
                $parameter['peraturan'] = "Peraturan Walikota Bandung Nomor 335 Tahun 2012";
                $parameter['ketentuan2'] = "Hanya berlaku untuk 1 (satu) lokasi usaha.";
            } else if ($izin->JenisIzin === 'IUPT'){
                $parameter['namasurat'] = "Izin Usaha Pengelolaan Pasar Tradisional (IUP2T)";
                $parameter['kegiatanusaha'] = "Pengelolaan pasar tradisional";
                $parameter['bidangusaha'] = "Pasar tradisional";
                $parameter['daftarulang'] = "5 (lima)";
                $parameter['peraturan'] = "Peraturan Walikota Bandung Nomor 335 Tahun 2012";
                $parameter['ketentuan2'] = "Hanya berlaku untuk 1 (satu) lokasi usaha.";
            } else if ($izin->JenisIzin === 'ITPMB'){
                $parameter['namasurat'] = "Izin Tempat Penjualan Minuman Berakohol (ITPMB)";
                $parameter['kegiatanusaha'] = "Penjualan minuman berakohol";
                $parameter['bidangusaha'] = "Minuman berakohol yang dijual secara eceran dan/atau secara langsung untuk diminum";
                $parameter['daftarulang'] = "1 (satu)";
                $parameter['peraturan'] = "Peraturan Daerah Kota Bandung Nomor 11 Tahun 2010";
                $parameter['ketentuan2'] = "Badan usaha, pengelola atau penanggung jawab usaha wajib menyampaikan laporan kepada Walikota 
                melalui SKPD yang ditunjuk yang membidangi urusan perdagan, paling lambat 2 (dua) bulan sekali.";             
            } else if ($izin->JenisIzin === 'IUPP'){
                $parameter['namasurat'] = "Izin Usaha Pusat Perbelanjaan (IUPP)";
                $parameter['kegiatanusaha'] = $izin->KegiatanUsaha;
                $parameter['bidangusaha'] = "Pusat perbelanjaan";
                $parameter['daftarulang'] = "5 (lima)";
                $parameter['peraturan'] = "Peraturan Walikota Bandung Nomor 335 Tahun 2012";
                $parameter['ketentuan2'] = "Hanya berlaku untuk 1 (satu) lokasi usaha.";
            } else if ($izin->JenisIzin === 'STPW'){
                $parameter['namasurat'] = "Surat Tanda Pendaftaran Waralaba (STPW)";
                $parameter['kegiatanusaha'] = $izin->KegiatanUsaha;
                $parameter['bidangusaha'] = "-";
                $parameter['daftarulang'] = "5 (lima)";
                $parameter['peraturan'] = "Peraturan Daerah Kota Bandung Nomor 10 Tahun 2013";
                $parameter['ketentuan2'] = "Tidak berlaku bila PErjanjian Waralaba berakhir";                
            }
            $parameter['nomorsurat'] = $izin->id."/2 - 0077 -DISKUKM & PERINDAG/2008";
            $parameter['namaperusahaan'] = $izin->NamaPerusahaan;
            $parameter['alamatperusahaan'] = $izin->AlamatPerusahaan;
            $parameter['namapemilik'] = $izin->NamaPemohon;
            $parameter['namausaha'] = $izin->NamaUsaha;
            $parameter['lokasiusaha'] = $izin->LokasiUsaha;
            $parameter['tanggal'] = date('d-m-Y', strtotime($izin->TanggalDisetujui));
            $parameter['berlakusampai'] = date('d-m-Y', strtotime($izin->BerlakuSampai));
            $parameter['kecamatan'] = "Antapani";
            $parameter['namakepala'] = "Drs. H. Ernawan Natasaputra";
            $parameter['jabatankepala'] = "Pembina Utama Muda";
            $parameter['nipkepala'] = "190 000 393";
            $pdf->loadView('SuratIzin', $parameter)->setPaper('a4')->setOrientation('portrait')->setWarnings(false)->save('myfile.pdf');
            
            DB::table('izin')->where('id',$id)->update(['DokumenPersetujuan' => '/suratizin/'.$id]);
            Redirect::back();
            return $pdf->download($izin->JenisIzin.'-'.$izin->NamaUsaha.'.pdf');
        }   
    }

    public function store(Request $request){
        $SuratIzinFile = $request->file('SuratIzinFile');
        $id = $request->get('id');
        /* Destination Path */
        $DestinationPath = public_path().'/File/Izin/Penerbitan/';
        $FileName = $id.'.pdf';

        /* Move uploaded file to destination path */
        if ($SuratIzinFile != null){
            $SuratIzinFile->move($DestinationPath, $FileName);
            DB::table('izin')->where('id',$id)->update(['DokumenPersetujuan' => $DestinationPath.$FileName]);
        }
        return Redirect::back();
    }

    public function viewSuratIzin($id){
        $izin = Izin::where('id','=',$id)->first();
        $filename = $izin->DokumenPersetujuan;
        $path = $filename;
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.$filename,
        ]);
    }
}