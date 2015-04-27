@extends('masuk')

@section('content')
	<h3 style="padding-left: 105px"> Daftar Perizinan Masuk </h3>
	<div class="documents container">
			<?php 
				foreach($izinair as $izin)
				{						
					echo '<div class="list-group col-xs-6">';
					echo '<a href="detilperizinandinas/'.$izin->id.'" class="list-group-item active">';
					echo '<h4 class="list-group-item-heading">'.$izin->kategori.'</h4>';
					echo '<p class="list-group-item-text left">'.$izin->deskripsi.'</p><br>';
					echo '</a>';
					echo '</div>';
				}
			?>
	</div>
@endsection