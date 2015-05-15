<?php





PDF::AddPage();

PDF::SetFont('helvetica', '', 15);
PDF::Write(0, 'PEMERINTAH KOTA BANDUNG', '', 0, 'C', true, 0, false, false, 0);
PDF::SetFont('helvetica', '', 18);
PDF::Write(0, 'DINAS KEBERSIHAN', '', 0, 'C', true, 0, false, false, 0);
PDF::SetFont('helvetica', '', 11);
PDF::Write(0, 'Jl.Surapati No. 126 Bandung 40122', '', 0, 'C', true, 0, false, false, 0);
PDF::Write(0, '', '', 0, 'C', true, 0, false, false, 0);
PDF::Line(10, 33, 200, 33, array());
PDF::Image('images/Logo-pemkot.png', 12, 12, 26, 20, 'PNG', '', 'C', true, 150, '', false, false, 0, false, false, false);


//PDF::SetTitle('Hello World');




// add HTML content

PDF::SetFont('helvetica', 'B', 28);
PDF::Write(0, 'Laporan Bulanan', '', 0, 'C', true, 0, false, false, 0);
PDF::SetFont('helvetica', 'B', 18);
PDF::Write(0, 'Data Singkat', '', 0, 'L', true, 0, false, false, 0);

PDF::SetFont('helvetica', '', 11);

//$mTPA = json_encode($jumTPA);
$mTPA = $jumTPA;
$mTPS = $jumTPS;
$mSarana = $jumSarana;
$mPetugas = $jumPetugas;
$mVolume = $jumVolume;
/*

$mTPA = json_decode($mTPA);
$mTPS = json_decode($mTPS);
$mSarana = json_decode($mSarana);
$mPetugas = json_decode($mPetugas);
$mVolume = json_decode($mVolume);

$mTPA = $mTPA["COUNT(*)"];
$mTPS = $mTPS["COUNT(*)"];
$mSarana = $mSarana["COUNT(*)"];
$mPetugas = $mPetugas["COUNT(*)"];
$mVolume = $mVolume["SUM(`volume`)"];
*/
$html = '
<div>
	<br>
	<table border="1" cellspacing="3" cellpadding="4" style="width:280px;">
		<tr>
			<td>Jumlah TPA: '.$mTPA.'</td>
			<td>Jumlah TPS: '.$mTPS.'</td>
		</tr>
		<tr>
			<td>Jumlah Sarana: '.$mPetugas.'</td>
			<td>Jumlah Petugas: '.$mSarana.'</td>
		</tr>
		<tr>
			<td colspan="2">Volume Sampah yang Diolah Bulan ini: '.$mVolume.' ltr</td>

		</tr>
	</table>
</div>
';
// output the HTML content
PDF::writeHTML($html, true, true, true, false, 'L');

PDF::SetFont('helvetica', 'B', 18);
PDF::Write(0, 'Data TPA', '', 0, 'L', true, 0, false, false, 0);

PDF::SetFont('helvetica', '', 11);




$html = '
<div>
	<br>
	<table border="1" cellspacing="3" cellpadding="4" style="width:280px;">
		<tr>
			<td>Nama</td>
			<td>Lokasi</td>
			<td>Volume</td>
		</tr>
		';

foreach($result as $row)
{
	$html .= 	'<tr>
					<td>'.$row['nama'].'</td>
					<td>'.$row['lokasi'].'</td>
					<td>'.$row['volume'].' lt</td>
				</tr>' ;        
}

$html .='		
	</table>
</div>
';
// output the HTML content
PDF::writeHTML($html, true, true, true, false, 'L');



PDF::Output('hello_world.pdf','I');

