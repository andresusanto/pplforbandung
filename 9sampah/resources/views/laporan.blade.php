<?php
//Connect Database Jorok

	// mysqli object that we will use 
	$config = array(
			'host' => 'localhost',
			'database' => 'trashsure',
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

$sql = "SELECT COUNT(*) FROM `tpa`";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$jumTPA = $row["COUNT(*)"];

$sql = "SELECT COUNT(*) FROM `tps`";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$jumTPS = $row["COUNT(*)"];

$sql = "SELECT COUNT(*) FROM `sarana`";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$jumSarana = $row["COUNT(*)"];

$sql = "SELECT COUNT(*) FROM `petugas`";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$jumPetugas = $row["COUNT(*)"];

$sql = "SELECT SUM(`volume`) FROM `tpa`";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$jumVolume = $row["SUM(`volume`)"];
$sql = "SELECT SUM(`volume`) FROM `tps`";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$jumVolume += $row["SUM(`volume`)"];

$html = '
<div>
	<br>
	<table border="1" cellspacing="3" cellpadding="4" style="width:280px;">
		<tr>
			<td>Jumlah TPA: '.$jumTPA.'</td>
			<td>Jumlah TPS: '.$jumTPS.'</td>
		</tr>
		<tr>
			<td>Jumlah Sarana: '.$jumSarana.'</td>
			<td>Jumlah Petugas: '.$jumPetugas.'</td>
		</tr>
		<tr>
			<td colspan="2">Volume Sampah yang Diolah Bulan ini: '.$jumVolume.' ltr</td>

		</tr>
	</table>
</div>
';
// output the HTML content
PDF::writeHTML($html, true, true, true, false, 'L');

PDF::SetFont('helvetica', 'B', 18);
PDF::Write(0, 'Data TPA', '', 0, 'L', true, 0, false, false, 0);

PDF::SetFont('helvetica', '', 11);

$sql = "SELECT * FROM `tpa`";
$result = $conn->query($sql);


$html = '
<div>
	<br>
	<table border="1" cellspacing="3" cellpadding="4" style="width:280px;">
		<tr>
			<td>Nama</td>
			<td>Lokasi</td>
			<td>Volume</td>
		</tr>';

while($row = mysqli_fetch_assoc($result)) {
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

