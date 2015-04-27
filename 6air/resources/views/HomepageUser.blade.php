@extends('base')
@section('title')
Homepage User
@endsection

@section('head')
<h3>Selamat Datang</h3>
<h4>Aplikasi perizinan air akan membantu anda mempermudah segala urusan terkait perizinan air.</h4>
@endsection


@section('content')
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