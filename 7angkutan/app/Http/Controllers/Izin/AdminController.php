<?php namespace App\Http\Controllers\Izin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StatusIzin;
use App\Models\Status;
use App\Models\Izin;
use App\Models\Dokumen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Session;
use PDF;
use App\Utility\MYPDF;
use TCPDF;
use Carbon\Carbon;
use DB;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth.admin');
	}

	public function getIndex()
	{
		$listIzin = Izin::orderBy('tanggal_pengajuan','desc')->orderBy('updated_by_pengguna','desc')->get();
		return view('izin.admin.index',compact('listIzin'));
	}

	public function getRead($id)
	{
		$izin = Izin::findOrFail($id);
		$izin->readedByAdmin();
		$templates = $izin->jenisIzin->templates;
		//generate dokumen
		foreach ($templates as $template) {
			if (Dokumen::where('izin_id','=',$id)->where('template_id','=',$template->id)->first()==null){
				$dokumen = new Dokumen();
				$dokumen->nama = $template->nama;
				$dokumen->izin_id = $id;
				$dokumen->template_id = $template->id;
				$dokumen->save();
				if (!$dokumen->template->butuh_upload){
					$dokumen->status = Dokumen::STATUS_PENDING;
				} else {
					$dokumen->status = Dokumen::STATUS_BELUM;
				}
				$dokumen->save();
			}
		}
		
		return view('izin.admin.read',compact('izin'));
	}

	public function getUpdate($id)
	{
		$currentStatus = StatusIzin::where('izin_id',$id)->orderBy('timestamp','desc')->first();
		$listStatus = Status::all();
		$izin = Izin::findOrFail($id);
		$izin->readedByAdmin();
		return view('izin.admin.update',compact('currentStatus','listStatus','izin'));
	}

	public function postUpdate(Request $request,$id)
	{
		$izin = Izin::findOrFail($id);
		$izin->deskripsi = $request->input('deskripsi');
		$izin->biaya = $request->input('biaya');
		$izin->save();
		Event::fire('izin.updated_by_admin',[$izin]);


		$statusIzin = new StatusIzin;
		$statusIzin->izin_id = $id;
		$statusIzin->status_id = $request->input('status');
		$statusIzin->timestamp = date("Y-m-d H:i:s");
		$statusIzin->save();

		Session::flash('notif-success','Status izin berhasil diubah');
		return redirect()->route('izin.admin.read',['id'=>$izin->id]);
	}

	public function getAgreeDokumen($id,$dokumen_id)
	{
		$dokumen = Dokumen::findOrFail($dokumen_id);
		$dokumen->status = Dokumen::STATUS_OK;
		$dokumen->save();

		$izin = Izin::findOrFail($id);
		Event::fire('izin.updated_by_admin',[$izin]);

		Session::flash('notif-success','Dokumen berhasil di setujui');

		return redirect()->route('izin.admin.read',compact('izin'));
	}

	public function getDisagreeDokumen($id,$dokumen_id)
	{
		$dokumen = Dokumen::findOrFail($dokumen_id);
		$dokumen->status = Dokumen::STATUS_BERMASALAH;
		$dokumen->save();

		$izin = Izin::findOrFail($id);
		Event::fire('izin.updated_by_admin',[$izin]);

		Session::flash('notif-success','Dokumen berhasil ditolak');
		return redirect()->route('izin.admin.read',compact('izin'));
	}

	public function getListReport() {
		return view('izin.admin.listreport');
	}

	public function getReport($month)
	{
		$monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September"
			,"Oktober","November","Desember"];
		$time = Carbon::now();
		$bulan = $month;
		$tahun = $time->year;


		$listIzin = Izin::where(DB::raw('Month(tanggal_pengajuan)'),$bulan)
					->where(DB::raw('Year(tanggal_pengajuan)'),$tahun)
					->select('id','jenisizin_id','nama_perusahaan','biaya')
					->get();

		$listIzinTable = [];

		$jumlahIzinAngkot = 0;
		$jumlahIzinTaksi = 0;
		$jumlahIzinDiterimaAngkot = 0;
		$jumlahIzinDiterimaTaksi = 0;
		$jumlahIzinDitolakAngkot = 0;
		$jumlahIzinDitolakTaksi = 0;

		foreach ($listIzin as $izin) {
			$izinTable[0] = $izin->id;
			$izinTable[1] = $izin->getNamaIzin();
			$izinTable[2] = $izin->getCurrentNamaStatus();
			$izinTable[3] = $izin["nama_perusahaan"];
			$izinTable[4] = $izin->biaya;
			if ($izinTable[4] == null) $izinTable[4] = '-';
			array_push($listIzinTable,$izinTable);

			if ($izinTable[2] == "Izin Ditolak") {
				if ($izin->getNamaIzin() == 'Izin Usaha Angkutan Umum') {
					$jumlahIzinAngkot++;
					$jumlahIzinDitolakAngkot++;
				} else {
					$jumlahIzinTaksi++;
					$jumlahIzinDitolakTaksi++;
				}
			} else {
				if ($izin->getNamaIzin() == 'Izin Usaha Angkutan Umum') {
					$jumlahIzinAngkot++;
					$jumlahIzinDiterimaAngkot++;
				} else {
					$jumlahIzinTaksi++;
					$jumlahIzinDiterimaTaksi++;
				}
			}
		}

		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Pemkot Bandung');
		$pdf->SetTitle('Laporan Bulanan');
		$pdf->SetSubject('Laporan bulanan');
		$pdf->SetKeywords('angkutan');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		$pdf->AddPage();

		$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

		$pdf->Line(10, 43, 200, 43, $style);


		$pdf->SetFont('times');
		$pdf->Cell(0,20,'',0,1);
		$pdf->Cell(0,0,'Laporan ini mengacu pada izin - izin yang masuk pada : ',0,1);

		$pdf->Cell(0,0,'Bulan : '.$monthName[$bulan-1],0,1);
		$pdf->Cell(0,0,'Tahun : '.$tahun,0,1);
		$pdf->Ln();
		$pdf->Ln();

		$pdf->Cell(0,0,'Tabel 1 - Tabel Ringkasan Izin',0,1);
		$columnWidth = [60,40,43,40];
		$header = ['Jenis Izin','Jumlah Izin Masuk','Jumlah Izin Diterima','Jumlah Izin Ditolak'];
		$list = [];
		array_push($list, ['Izin Angkutan Umum',$jumlahIzinAngkot,$jumlahIzinDiterimaAngkot,$jumlahIzinDitolakAngkot]);
		array_push($list, ['Izin Taksi',$jumlahIzinTaksi,$jumlahIzinDiterimaTaksi,$jumlahIzinDitolakTaksi]);
		$pdf->ColoredTable($header,$list,$columnWidth);
		$pdf->Ln();

		//Tabel Rincian Izin
		$pdf->Cell(0,0,'Tabel 2 - Tabel Rincian Izin',0,1);

		$columnWidth = [20, 60, 35, 35, 35];
		$header = ['ID','Jenis Izin','Status','Perusahaan','Biaya'];
        $pdf->ColoredTable($header,$listIzinTable,$columnWidth);

        //Pie Sector
        /*$xc = 50;
		$yc = 103;
		$r = 30;
        $pdf->SetFillColor(255, 255, 175);
		$pdf->PieSector($xc, $yc, $r, 0, 180, 'F', false, 0, 2);

		$pdf->SetFillColor(123, 184, 237);
		$pdf->PieSector($xc, $yc, $r, 180, 0, 'F', false, 0, 2);


		// write labels
		$pdf->PieLabel("Angkutan Umum",$xc,$yc,$r,0,180,0);
		$pdf->PieLabel("Taksi",$xc,$yc,$r,180,360,0);*/

		$pdf->Output('laporan_bulanan.pdf');
	}

	public function getMarkSpam($id)
	{
		$izin = Izin::findOrFail($id);
		$izin->spam = !$izin->spam;
		$izin->save();
		Event::fire('izin.updated_by_admin',[$izin]);
		return redirect()->route('izin.admin.index');
	}
}
