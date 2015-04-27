@extends('app')

@section('content')

<div class="main">
	<div class="main-inner">
		<div class="container">
			<table class="table striped responsive span10">
			<div class="control-group">		
					<h2>Daftar Perizinan Masuk</h2>
				
				<table class="table table-striped table-hover ">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Jenis Izin</th>
						  <th>Deskripsi</th>
						  <th>Status</th>
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
								echo '<td>Izin Pengelolaan Air Bawah Tanah</td>';
								echo '<td>'.$izin->deskripsi.'</td>';
								echo '<td>'.$izin->status.'</td>';
								echo '<td><a href="'.action("PerizinanAirController@approveizin",array($izin->id, 1)).'">Approve</a> <a href="'.action("PerizinanAirController@approveizin",array($izin->id, 0)).'">Reject</a></td>';
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
