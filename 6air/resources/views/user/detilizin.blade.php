@extends('app')


@section('content')
<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
			<table class="table striped responsive span6">
			<div class="control-group">		
				<div style="padding-left: 36px">	
					<h2>Detail Perizinan</h2>
				</div><br><br>	
				<tr>
					<td>Nama Pemohon </td>
					<td>: Nisa</td>
				</tr>
				<tr>
					<td>Lokasi </td>
					<td>: Bandung Barat</td>
				</tr>
				<tr>
					<td>Kategori Izin</td>
					<td>: Izin Pengelolaan Air Bawah Tanah</td>
				</tr>
				<tr>
					<td>Deskripsi </td>
					<td>: <?php
								echo $izinair->deskripsi;
							?></td>
				</tr>
				<tr>
					<td>Berlaku Hingga </td>
					<td>: 17 April 2015</td>
				</tr>
			</div>
			</table>
			<div class="span4 offset1">
				<a href="{{ action ('PerizinanAirController@ubahperizinan', $izinair->id) }}" class="btn btn-primary span2">Ubah</a>
				<br><br>
				<a href="{{ action ('PerizinanAirController@perpanjangperizinan', $izinair->id) }}" class="btn btn-warning span2">Perpanjang</a>
				<br><br>
				<a href="#" class="btn btn-danger span2">Ajukan Keberatan</a>
			</div>
			</div>
			<br>
		</div>
	</div>
</div>
@endsection