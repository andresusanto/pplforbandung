@extends('layouts.master')

@section('content')
<div class="carousel slide" id="landingCarousel">
	<div class="carousel-inner">
		<div class="item active">
			<img src="{{asset('atia/img/angkotPark.png')}}" alt="">
			<div class="carousel-caption">
				<h2>Selamat Datang!</h2>
				<p>Aplikasi web terkait Izin Usaha Angkutan merupakan bagian dari Sistem Informasi Terpadu milik Pemerintah Kota Bandung.</p>
			</div>
		</div>
		<div class="item">
			<img src="{{asset('atia/img/taxiPark.png')}}" alt="">
			<div class="carousel-caption">
				<h2>Permohonan Izin Usaha Angkutan</h2>
				<p>Ada dua jenis permohonan izin usaha angkutan, yaitu permohonan izin untuk angkutan bertrayek (Izin Usaha Angkutan Umum) dan permohonan izin untuk angkutan yang tidak memiliki trayek tertentu (Izin Usaha Taksi).</p>
			</div>
		</div>
		<div class="item">
			<img src="{{asset('atia/img/procedure.png')}}" alt="">
			<div class="carousel-caption">
				<h2>Prosedur Pengajuan Permohonan Izin</h2>
				<p>Aplikasi web ini dikembangkan untuk mempermudah masyarakat kota Bandung yang hendak mengajukan Izin Usaha Angkutan.</p>
			</div>
		</div>
	</div>
	<a href="#landingCarousel" class="carousel-control left" data-slide="prev"></a>
	<a href="#landingCarousel" class="carousel-control right" data-slide="next"></a>
</div>
@endsection
