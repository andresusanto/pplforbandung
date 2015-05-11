@extends('app')

@section('content')
	<?php 
		$i = 1; 
		$bdg = ['Agro','Kimia','Logam','Alat Transportasi','Elektronika','Tekstil','Produk Tekstil','Mesin Elektronika & Aneka','Non-Formal'];
		$skl = ['Mikro','Kecil','Menengah'];
		$jns = ['Makanan','Minuman','Bahan-Kimia','Elektronik','Kerajinan','Logam','Transportasi','Tekstil','Lain-lain'];
		$statusproduk = ['Belum Disetujui','Disetujui'];
		$izin = ['Pending','Sedang Diproses','Ditolak','Disetujui'];
		$pajak = ['Belum Membayar', 'Sudah Membayar'];
	?>
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{$usaha->nama}}
				
			</h1>
		</div>
	</div>
	<!-- /.row -->
	
	
	<div class="row">
		<div class="col-md-7">
			<a href="#">
				<img class="img-responsive" src= {{'/' . $usaha->imagepath}}>
				
			</a>
		</div>
		<div class="col-md-5">
			<h4>Kategori: {{$bdg[$usaha->bidang]}}</h4>
			<h4>Skala : {{$skl[$usaha->skala]}}</h4>
			<h4>Alamat : {{$usaha->lokasi}}</h4>
			<h4>Nomor Telepon : {{$usaha->telepon}}</h4>
			<h4>Email : {{$usaha->email}}</h4>
			<br><br>
			<a class="btn btn-primary" href="/download/{{$usaha->id}}">Download Dokumen <span class="glyphicon glyphicon-download-alt"></span></a>
		</div>
	</div>
	<!-- /.row -->

	<div class="table-responsive">
		<table class="table">
			<caption>
				<h3>Produk</h3>
			</caption>
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Jenis</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($produks as $produk)
				<tr>
					<th>{{$i}}</th>
					<th>{{$produk->nama}}</th>
					<th>{{$jns[$produk->jenis]}}</th>
					<th>{{$statusproduk[$produk->status]}}</th>
					{!! Form::open(['url'=>'/hapusproduk/' . $produk->id , 'method' => 'delete', 'style'=>'display:inline-block']) !!}
					<td><button class="btn btn-primary" type="submit" onclick="deleteobject"><span class="glyphicon glyphicon-trash"></span></button>
					{!! Form::close() !!}
					{!! Form::open(['url'=>'/terimaproduk/' . $produk->id,'style'=>'display:inline-block' ]) !!}
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span></button></td>
					{!! Form::close() !!}
					<?php $i++; ?>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<hr>
	


	
@endsection

@section('script')
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
@endsection