@extends('app')

@section('content')

	@echo user;
	<?php 
		$bdg = ['Agro','Kimia','Non-Formal'];
		$skl = ['Mikro','Kecil','Menengah'];
	?>
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Daftar UKM dan Industri Perdagangan di Kota Bandung
				<small></small>
			</h1>
		</div>
	</div>
	<!-- /.row -->
	@foreach ($usahas as $usaha)
	<!-- Project One -->
	<div class="row">
		<div class="col-md-7">
			<a href="#">
				<img class="img-responsive" src="http://placehold.it/700x300" alt="">
			</a>
		</div>
		<div class="col-md-5">
			<h3>{{$usaha->nama}}</h3>
			<h4>Kategori: {{$bdg[0]}}</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
			<a class="btn btn-primary" href="/daftar-usaha/{{$usaha->id}}">Lihat Data Lengkap<span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
	<!-- /.row -->

	<hr>
	@endforeach

	<hr>
@endsection

@section('script')
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
@endsection