@extends('app')

@section('content')

<div class="main">
	<div class="main-inner">
		<div class="container">
			<table class="table striped responsive span10">
			<div class="control-group">		
					<h2>Daftar Pengaduan</h2>
				
				<table class="table table-striped table-hover ">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Judul</th>
						  <th>Deskripsi</th>
						  <th>Pelapor</th>
						  <th>Aksi</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
							$i = 1;
							foreach($pengaduans as $pengaduan)
							{
								echo '<tr>';
								echo '<td>' . $i++ . '</td>';
								echo '<td>'.$pengaduan->judul.'</td>';
								echo '<td>'.$pengaduan->aduan.'</td>';
								echo '<td>'.$pengaduan->nama.' ('. $pengaduan->kontak .')</td>';
								echo '<td><a href="'.action("PerizinanAirController@markpengaduan",array($pengaduan->id)).'">Mark Done</a></td>';
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
