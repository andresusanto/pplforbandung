<?php
$name = 'usaha_sarana';
$redirect_uri = 'http://usahasarana.pplbandung.biz.tm/login_callback';
$client_id = '0XiZ8LzQTmO9lEnt';
$client_secret = 'E8wMZsM3AJdWATl2';
$login = 'http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=0XiZ8LzQTmO9lEnt&redirect_uri=http://usahasarana.pplbandung.biz.tm/login_callback&response_type=code';

//test ke localhost
$name_local = 'saranaperdaganganlocalhost';
$client_id_local = 'ulP9hlsW74ahy2ND';
$redirect_uri_local = 'http://localhost:8000/login_callback';
$client_secret_local = 'JDPqeCpwEFUY6F4Q';
$login_local = 'http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=ulP9hlsW74ahy2ND&redirect_uri=http://localhost:8000/login_callback&response_type=code';

//check if user has login or not
function redirection($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

$json = DB::table('pengguna')->where('id',1)->first();
$nama = $json->nama;
if($nama === 'current_username')
{
    //redirect
    redirection('http://localhost:8000');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bandung BerUsaha</title>

	<link href="{{ asset('/css/user/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/user/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/user/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/user/css/style.css') }}" rel="stylesheet">
	<!--<link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet">-->
	
	<link rel='stylesheet' type='text/css' href='assets/js/gritter/css/jquery.gritter.css' />
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">			
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php echo "<img src=".asset("/img/logo2.png");?> class="img-circle" width="60" style="float: left">
				<a href="{{Route('userhome')}}" class="brand">Bandung Berusaha</a>
				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li class="dropdown">						
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-cog"></i>
								<?php

								echo 'Welcome, '.$nama;

								?>
								<b class="caret"></b>
							</a>

							<ul class="dropdown-menu">
								<li><a href="{{route('logout')}}">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->	
			</div>
		</div> <!-- /navbar-inner -->
	</div> <!-- /navbar -->
	
	<div class="subnavbar">
		<div class="subnavbar-inner">
			<div class="container">
				<ul class="mainnav">
					<li <?php if ($jenis == 'IzinUsahaTokoModern') echo 'class = "active mt"';?> >
						{{--<i class="icon-dashboard"></i>--}}
						<a href="<?php if ($jenis == 'IzinUsahaTokoModern') echo '#'; 
						else { if ($stats == "admin") echo url('/Admin/izin/IzinUsahaTokoModern'); else if ($stats == "user") echo url('/izin/IzinUsahaTokoModern');}?>">Izin Usaha Toko Modern</a>
					</li>
					
					<li <?php if ($jenis == 'IzinUsahaPusatPerbelanjaan') echo 'class = "active"';?> >
					{{--<i class="icon-list-alt"></i>--}}
						<a href="<?php if ($jenis == 'IzinUsahaPusatPerbelanjaan') echo '#'; 
						else { if ($stats == "admin") echo url('/Admin/izin/IzinUsahaPusatPerbelanjaan'); else if ($stats == "user") echo url('/izin/IzinUsahaPusatPerbelanjaan');}?>">Izin Usaha Pusat Perbelanjaan</a>
					</li>
											
					<li <?php if ($jenis == 'IzinUsahaPasarTradisional') echo 'class = "active"';?> >
					{{--<i class="icon-facetime-video"></i>--}}
						<a href="<?php if ($jenis == 'IzinUsahaPasarTradisional') echo '#'; 
						else { if ($stats == "admin") echo url('/Admin/izin/IzinUsahaPasarTradisional'); else if ($stats == "user") echo url('/izin/IzinUsahaPasarTradisional');}?>">Izin Usaha Pasar Tradisional</a>
					</li>
									
					<li <?php if ($jenis == 'IzinTempatPenjualanMinumanBeralkohol') echo 'class = "active"';?> >
					{{--<i class="icon-bar-chart"></i>--}}
						<a href="<?php if ($jenis == 'IzinTempatPenjualanMinumanBeralkohol') echo '#'; 
						else { if ($stats == "admin") echo url('/Admin/izin/IzinTempatPenjualanMinumanBeralkohol'); else if ($stats == "user") echo url('/izin/IzinTempatPenjualanMinumanBeralkohol');}?>">Izin Tempat Penjualan Minuman Beralkohol</a>
					</li>
					
					<li <?php if ($jenis == 'TandaPendaftaranWaralaba') echo 'class = "active"';?> >
						{{--<i class="icon-code"></i>--}}
							<a href="<?php if ($jenis == 'TandaPendaftaranWaralaba') echo '#'; 
							else { if ($stats == "admin") echo url('/Admin/izin/TandaPendaftaranWaralaba'); else if ($stats == "user") echo url('/izin/TandaPendaftaranWaralaba');}?>">Izin Tanda Pendaftaran Waralaba</a>
						</li>
					</li>
				</ul>
			</div> <!-- /container -->		
		</div> <!-- /subnavbar-inner -->
	</div> <!-- /subnavbar -->
		
	<div class="main" id = "content">
		<div class="main-inner">
			<div class="container">
		@yield('content')
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/user/js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/user/js/base.js') }}"></script>
	<script src="{{ asset('js/user/js/jquery-1.7.2.min.js') }}"></script>
	<script src="{{ asset('js/user/js/faq.js') }}"></script>
</body>
</html>
