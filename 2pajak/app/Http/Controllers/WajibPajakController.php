<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use PDF;
use TCPDF;
use App\Pajak;
use App\WajibPajak;
use App\BayarPajak;
use App\Classes\SSOData;
use Illuminate\Http\Request;
use Redirect;

class WajibPajakController extends Controller {
	
	public function index()
	{
		$wajibPajak = WajibPajak::all();
        return $wajibPajak;
	}

    public function register(){
        $wajibpajak = new WajibPajak;
        $arr=SSOData::GetDataPenduduk();
        if (get_class($redir = (object) $arr) === 'Illuminate\Http\RedirectResponse'){
            return $redir;
        }
		
        $wajibpajak->nama = $arr['Nama'];
        $wajibpajak->nik = $arr['NIK'];
        $wajibpajak->npwpd = $arr['NIK'];
        $wajibpajak->tempat_lahir = $arr['Tempat Lahir'];
        $wajibpajak->tanggal_lahir = date('d-m-Y',strtotime($arr['Tgl Lahir']));
        $wajibpajak->alamat = $arr['Alamat'];
        $wajibpajak->save();
        return Redirect::to('/wp/home');
    }
	
	public function seeLaporan($nik){
		$wp_cari = WajibPajak::where('nik','=',$nik)->get();
		if (!count($wp_cari)){
			$hsl['status']='ERROR NIK NOT FOUND';
			return $hsl;
		} else {
			$hsl['status']='ok';
		}
		$wp_f=$wp_cari[0];
		$npwpd=$wp_f['npwpd'];
		$hsl['NIK']=$wp_f['nik'];
		$hsl['NPWPD']=$npwpd;
		$hsl['Nama']=$wp_f['nama'];
		$hsl['Alamat']=$wp_f['alamat'];
		$hsl['Tempat Lahir']=$wp_f['tempat_lahir'];
		$hsl['Tgl Lahir']=date('d-m-Y',strtotime($wp_f['tanggal_lahir']));
		$hsl['Status Pajak']=array();
		
        $wp_pjk = Pajak::where('npwpd','=',$npwpd)->get();
		foreach($wp_pjk as $pjk_i){
			$tipe=$pjk_i['kategori'];
			/*$tp=array();
			if ($pjk_i['status_pelunasan']==0){
				$tp[$tipe]='Lunas';
			} else {
				$tp[$tipe]='Tertunggak';
			}
			array_push($hsl['Status Pajak'],$tp);*/
			$tp_mdl=BayarPajak::where('npwpd','=',$npwpd);
			$tp_mdl->where('jenis_pajak','=',$tipe);
			$tp_mdl->where('status_pembayaran','=','lunas');
			$tp_mdl->orderBy('tanggal_pembayaran', 'DESC');
			$byr = $tp_mdl->get();
			$a=date_create('now');
			if (count($byr)){
				$b=date_create($byr[0]['tanggal_pembayaran']);
				$c=$byr[0]['masa_pajak'];
			} else {
				$b=date_create($pjk_i['tanggal']);
				$c=1;
			}
			$tp=array();
			if (date_diff($a,$b)->format('%y')<$c){
				$tp[$tipe]='Lunas';
			} else {
				$tp[$tipe]='Tertunggak';
			}
			array_push($hsl['Status Pajak'],$tp);
		}
		return $hsl;
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

    public function laporan($id){
        $config = array(
            'host' => 'localhost',
            'database' => 'ppl',
            'username' => 'root',
            'password' => ''
        );
        $conn = mysqli_connect($config["host"], $config["username"], $config["password"], $config["database"]);
        if (!$conn) {
            die("Error " . mysqli_errno($conn) . ": " . mysqli_error($conn));
        }
        PDF::AddPage();
        PDF::SetFont('helvetica', '', 15);
        PDF::Write(0, 'PEMERINTAH KOTA BANDUNG', '', 0, 'C', true, 0, false, false, 0);
        PDF::SetFont('helvetica', '', 18);
        PDF::Write(0, 'DINAS Pendapatan Kota Bandung', '', 0, 'C', true, 0, false, false, 0);
        PDF::SetFont('helvetica', '', 11);
        PDF::Write(0, 'Jl. Wastukencana No. 2 Bandung 9999', '', 0, 'C', true, 0, false, false, 0);
        PDF::Write(0, '', '', 0, 'C', true, 0, false, false, 0);
        PDF::Line(10, 33, 200, 33, array());
        PDF::SetFont('helvetica', 'B', 18);
        PDF::Write(0, 'Laporan '.$id, '', 0, 'L', true, 0, false, false, 0);
        PDF::SetFont('helvetica', '', 11);
        $sql = "SELECT * FROM `pajak` WHERE npwpd = $id AND status_pelunasan = 1";
        $result = $conn->query($sql);
        PDF::SetFont('helvetica', 'B', 28);
        PDF::Write(0, 'Pajak Lunas', '', 0, 'C', true, 0, false, false, 0);
        PDF::SetFont('helvetica', '', 11);
        $html = '
<div>
	<br>
	<table border="1"  style="width:280px;">
		<tr>
			<td>NIK</td>
			<td>Kategori</td>
			<td>Aset</td>
			<td>Jumlah Pajak</td>
			<td>Status Pelunasan</td>
			<td>Tanggal Lunas</td>
		</tr>';
        while($row = mysqli_fetch_assoc($result)) {
            $html .= 	'<tr>
					<td>'.$row['npwpd'].'</td>
					<td>'.$row['kategori'].'</td>
					<td>'.$row['aset_kepemilikan'].'</td>
					<td>'.$row['jumlah_pajak'].'</td>
					<td>'."Lunas".'</td>
					<td>'.$row['tanggal'].'</td>
				</tr>' ;
        }
        $html .='
	</table>
</div>
';
        PDF::writeHTML($html, true, true, true, false, 'L');
        PDF::SetFont('helvetica', '', 11);
        $sql = "SELECT * FROM `pajak` WHERE npwpd = $id AND status_pelunasan = 0";
        $result = $conn->query($sql);
        PDF::SetFont('helvetica', 'B', 28);
        PDF::Write(0, 'Pajak Tertunggak', '', 0, 'C', true, 0, false, false, 0);
        PDF::SetFont('helvetica', '', 11);
        $html = '
<div>
	<br>
	<table border="1"  style="width:280px;">
		<tr>
			<td>NIK</td>
			<td>Kategori</td>
			<td>Aset</td>
			<td>Jumlah Pajak</td>
			<td>Status Pelunasan</td>
			<td>Batas Pembayaran</td>
		</tr>';
        while($row = mysqli_fetch_assoc($result)) {
            $html .= 	'<tr>
					<td>'.$row['npwpd'].'</td>
					<td>'.$row['kategori'].'</td>
					<td>'.$row['aset_kepemilikan'].'</td>
					<td>'.$row['jumlah_pajak'].'</td>
					<td>'."Belum Lunas".'</td>
					<td>'.$row['tanggal'].'</td>
				</tr>' ;
        }
        $html .='
	</table>
</div>
';
// output the HTML content
        PDF::writeHTML($html, true, true, true, false, 'L');
        PDF::Output('laporan.pdf','I');
    }
}
