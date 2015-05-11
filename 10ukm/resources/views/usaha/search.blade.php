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
	@foreach ($searchedusaha as $usaha)
	<!-- Project One -->
	<div class="row">
		<div class="col-md-7">
			<a href="#">
				<img class="img-responsive" src= {{$usaha->imagepath}}>
			</a>
		</div>
		<div class="col-md-5">
			<h3>{{$usaha->nama}}</h3>
			<h4>Kategori: {{$bdg[$usaha->bidang]}}</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
			<a class="btn btn-primary" href="daftar-usaha/{{$usaha->id}}">Lihat Data Lengkap<span class="glyphicon glyphicon-chevron-right"></span></a>
			&nbsp;&nbsp;
			<a class="btn btn-primary" href="edit-usaha/{{$usaha->id}}">Ubah Data Usaha<span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
	<!-- /.row -->

	<hr>
	@endforeach

	<!-- Pagination -->
	<div class="row text-center">
		<div class="col-lg-12">
			<ul class="pagination">
				<li>
					<a href="#">&laquo;</a>
				</li>
				<li class="active">
					<a href="#">1</a>
				</li>
				<li>
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
				<li>
					<a href="#">&raquo;</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /.row -->

	<hr>
@endsection

@section('script')
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
@endsection