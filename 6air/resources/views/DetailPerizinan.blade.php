@extends('detail')

@section('content')
<div class="container documents">
		<div class="col-md-6">
		<table class="table striped responsive">
			<tbody>
			<tr>
				<td>Nama Pemohon</td>
				<td>Menori</td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td>Cimahi</td>
			</tr>
			<tr>
				<td>Jenis Izin</td>
				<td>Izin Pengelolaan Air Bawah Tanah</td>
			</tr>
			<tr>
				<td>Instansi</td>
				<td>HMIF</td>
			</tr>
			<tr>
				<td>Berlaku Hingga</td>
				<td>17 April 2017</td>
			</tr>
			</tbody>
		</table>
		</div>
		<div class="col-md-2"></div>
			<a href="FormPerubahanIzin.html" class="col-md-2 btn btn-primary">Ubah</a><br><br><br>
		<div class="col-md-2"></div>
			<a href="" class="col-md-2 btn btn-info">Perpanjang</a><br><br><br>
		<div class="col-md-2"></div>
			<a href="" class="col-md-2 btn btn-success">Unduh Laporan</a>
		
	</div>
@endsection