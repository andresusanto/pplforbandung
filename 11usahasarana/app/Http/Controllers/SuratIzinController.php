<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\PDF;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Input;
use App\database;

class SuratIzinController extends Controller 
{
    public function index()
    {
    	$pdf = App::make('dompdf');
    	$parameter = array();
        $parameter['namasurat'] = "SURAT IZIN USAHA PERDAGANGAN (SIUP)";
    	$parameter['nomorsurat'] = "510/2 - 0077 -DISKUKM & PERINDAG/2008";
    	$parameter['namaperusahaan'] = "PT. DUTA FUTURE INTERNATIONAL";
    	$parameter['merek'] = "-";
    	$parameter['alamatperusahaan'] = "Jl. Kuningan 13 no. 11 A Kel. Antapani Tengah Kecamatan Antapani Kota Bandung";
    	$parameter['namapemilik'] = "Febrian Agung Budi Prastyo";
    	$parameter['alamatpemilik'] = "Jl. Kuningan 15 no. 19 Kel. Antapani Tengah Kecamatan Antapani Kota Bandung";
    	$parameter['npwp'] = "02.789.009.4 - 429.000";
    	$parameter['nilaimodal'] = "Rp285.000.000,00";
    	$parameter['kegiatanusaha'] = "Perdagangan Barang dan Jasa";
    	$parameter['kelembagaan'] = "Pemasok";
    	$parameter['bidangusaha'] = "-";
    	$parameter['jenisbarang'] = "Alat, suku cadang, alat tulis, katering, komputer";
    	$parameter['tanggal'] = "17 Maret 2008";
        $parameter['berlakusampai'] = "17 Maret 2013";
    	$parameter['kecamatan'] = "Antapani";
    	$parameter['namakepala'] = "Drs. H. Ernawan Natasaputra";
    	$parameter['jabatankepala'] = "Pembina Utama Muda";
    	$parameter['nipkepala'] = "190 000 393";
        $pdf->loadView('SuratIzin', $parameter)->setPaper('folio')->setOrientation('portrait')->setWarnings(false)->save('myfile.pdf');
        return $pdf->stream();
    }
}