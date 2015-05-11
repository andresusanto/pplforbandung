@extends('app')

@section('content')
	<?php 
		$bdg = ['Agro','Kimia','Logam','Alat Transportasi','Elektronika','Tekstil','Produk Tekstil','Mesin Elektronika & Aneka','Non-Formal'];
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
		<div class="col-md-5">
			<a href="#">
				<img class="img-responsive" width="300" height="300" src= {{'/' . $usaha->imagepath}}>
			</a>
		</div>
		<div class="col-md-7">
			<h3>{{$usaha->nama}}</h3>
			<h4>Kategori: {{$bdg[$usaha->bidang]}}</h4>
			<br>
			<a class="btn btn-primary" href="daftar-usaha/{{$usaha->id}}">Lihat Data Lengkap<span class="glyphicon glyphicon-chevron-right"></span></a>
			&nbsp;&nbsp;
		</div>
	</div>
	<!-- /.row -->

	<hr>
	@endforeach


	<hr>
@endsection

@section('script')
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
@endsection