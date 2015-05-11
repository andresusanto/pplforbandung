@extends('app')

@section('content')
	<?php 
		$bdg = ['Agro','Kimia','Non-Formal'];
		$skl = ['Mikro','Kecil','Menengah'];
	?>
	<div class="main" id="content">
		<div class="main-inner">
			<div class="container">
				<h3><center>Selamat datang di dalam Aplikasi UKM dan Indag</center></h3>
				<h4><center>Anda dapat mendaftarkan izin usaha Anda di sini dengan cepat dan mudah</center></h4>
				<h4><center style="margin-top: 2%"><a href="http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=xOmoRlzwpDBXDZJz&amp;redirect_uri=http://localhost:8888/loginsso&amp;response_type=code"><span style="padding: 1%" class="label label-info">Silakan Login Terlebih Dahulu</span></a></center></h4>
			</div>
		</div>
	</div>
			
	

	

	<hr>
@endsection

@section('script')
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
@endsection