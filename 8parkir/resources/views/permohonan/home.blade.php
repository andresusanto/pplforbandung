@extends('app')

@section('head')

<style>
  	.carousel-inner > .item > img,
  	.carousel-inner > .item > a > img {
		width: 100%;
	  	margin: auto;
	}
  	.item{
		height: 450px;
  	}	

  	.verticalLine {
    	border-left: thick solid #7D858A;
	}
</style>

@stop

@if(!Session::has('user'))
	@section('content')
	<br><br><br><br><br>
		<div class="container">
			<div class="row">
    			<div class="col-md-2 col-md-offset-5">
    				<p><strong>You must login to access this page!</strong></p>
					<a class="btn btn-lg btn-info" href="http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=lS8IPqEYcX2vMkPJ&redirect_uri=http://localhost/parkhere/parkhere/public/loginsso&response_type=code">login</a>
    			</div>
			</div>
		</div>

@else
	@section('guest')
	<ul class="nav navbar-nav">
		<li class="active"><a href="{{URL::route('home')}}">Beranda</a></li>
		<li><a href="{{URL::route('form_permohonan')}}">Ajukan Permohonan</a></li>
		<li><a href="{{URL::route('daftar_permohonan')}}">Daftar Permohonan</a></li>
		<li><a href="{{URL::route('daftar_izin')}}">Daftar Izin</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="#">Selamat Datang {{Session::get('user')->nama_penduduk}}</a></li>
		<li><a href="{{URL::route('logoutsso')}}">Logout</a></li>
	</ul>

	@stop

	@section('content')
	<!-- image slider make carousel -->	  
	<br><br>
	<div id="homeCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#homeCarousel" data-slide-to="1"></li>
		  <li data-target="#homeCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
		  <div class="item active">
			<img src="{{ URL::asset('image/Terminal-bus.jpg') }}" alt="First-slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Terminal Leuwipanjang</h1>
				</div>
			</div>
		  </div>

		  <div class="item">
			<img src="{{ URL::asset('image/Terminal-bus-cicaheum.jpg') }}" alt="Second-slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Terminal Cicaheum</h1>
				</div>
			</div>
		  </div>
		
		  <div class="item">
			<img src="{{ URL::asset('image/parkir.jpg') }}" alt="Third-slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Lahan Parkir</h1>
				</div>
			</div>
		  </div>
		</div>	

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>

	<!-- selesai image slider -->


	<div class="jumbotron">
		<div class="container">
			<div class="col-sm-6">
				<div class="col-sm-4">
					<br />
					<img src="{{ URL::asset('image/logo-pemkot-bandung.png') }}" alt="" width="100%" height="100%" >
				</div>
				<div class="col-sm-8">
					<h2> Layanan Parkir dan Terminal Bandung </h2>
				</div>
			</div>

			<div class="col-sm-12">
				<hr style="width: 100%; height: 3px; background-color:#7D858A" />
				<div class="verticalLine">
					<h2>  Layanan ini menangani segala hal mengenai parkir dan terminal, seperti permohonan izin lahan parkir dan pembayaran 
						retribusi </h2>
				</div>
			</div>
		</div>
	</div>

@endif
@endsection