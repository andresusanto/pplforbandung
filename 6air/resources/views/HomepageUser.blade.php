@extends('welcome')

@section('content')
<div class="index"><h1><img src="{{asset('/img/logo-index.png')}}" ></h1><h2>Aplikasi Perizinan Air akan membantu anda dalam hal perizinan terkait air di Kota Bandung.</h2></div>
			<ul class="social"></ul>
			<h3 style="padding-left: 105px"> Perizinan Anda </h3>
			<div class="documents container">
				<?php
					foreach($izinair as $izin)
					{
						echo '<div class="list-group col-xs-6">';
						echo '<a href="detailperizinanuser/'.$izin->id.'" class="list-group-item active">';
						echo '<h4 class="list-group-item-heading">Izin Pengelolaan Air Bawah Tanah</h4>';
						echo '<p class="list-group-item-text left">'.$izin->deskripsi.'</p><br>';
						echo 'Status :'.$izin->status.'</a>';
						echo '</div>';
					}
				?>
			</div>
			
@endsection