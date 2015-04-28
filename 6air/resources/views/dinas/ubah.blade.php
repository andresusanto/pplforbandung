@extends('app')

@section('content')

<div class="main">
	<div class="main-inner">
		<div class="container">
			<table class="table striped responsive span10">
			<div class="control-group">		
					<h2>Daftar Permohonan Perubahan Izin</h2>
				
				<table class="table table-striped table-hover ">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Jenis Izin</th>
						  <th>Deskripsi</th>
						  <th>Lokasi</th>
						  <th>Aksi</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
							$i = 1;
							foreach($izinair as $izin)
							{
								echo '<tr>';
								echo '<td>' . $i++ . '</td>';
								echo '<td>'.$izin->kategori.'<br/><em>menjadi</em><br/>'.$izin->kategori_baru.'</td>';
								echo '<td>'.$izin->deskripsi.'<br/><em>menjadi</em><br/>'.$izin->deskripsi_baru.'</td>';
								echo '<td>'.$izin->lokasi.'<br/><em>menjadi</em><br/>'.$izin->lokasi_baru.'</td>';
								echo '<td><a href="'.action("PerizinanAirController@ubahizin",array($izin->id, 1)).'">Approve</a> <a href="'.action("PerizinanAirController@ubahizin",array($izin->id, 0)).'">Reject</a></td>';
								echo '</tr>';
								
							}
						?>
					  </tbody>
					  </table>
					  
			</div>
			</table>
			<div style="padding-bottom: 280px">
			<div>
		</div>
	</div>
</div>
</div></div>
@endsection
