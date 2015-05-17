@extends('app')

@section('content')

<div class="main">
	<div class="main-inner">
		<div class="container">
			<table class="table striped responsive span10">
			<div class="control-group">		
					<h2>Hasil Pencarian</h2>
				
				<table class="table table-striped table-hover ">
					  <thead>
						<tr>
						  <th>Nomor Izin</th>
						  <th>Jenis Izin</th>
						  <th>Deskripsi</th>
						  <th>Status</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
							foreach($izinair as $izin)
							{
								echo '<tr>';
								echo '<td>' . $izin->id . '</td>';
								echo '<td>'.$izin->kategori.'</td>';
								echo '<td>'.$izin->deskripsi.'</td>';
								echo '<td>'.$izin->status.'</td>';
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
