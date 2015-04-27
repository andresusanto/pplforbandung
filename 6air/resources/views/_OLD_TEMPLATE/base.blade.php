<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"><title>@yield('title')</title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="shortcut icon" href="favicon_16.ico">
	<link rel="bookmark" href="favicon_16.ico">
	<link href="{{ asset('/css/site.min.css') }}" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css"><!--[if lt IE 9]><script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script><![endif]--><script type="text/javascript" src="js/site.min.js"></script>
</head>
 <body style="background-color: #f1f2f6">
	<div class="docs-header">
		<nav class="navbar navbar-default navbar-custom" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
					</button> 
					<a class="navbar-brand" href="{{action('WelcomeController@index')}}"><img src="{{asset('/img/title.png')}}" height="40"></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{PerizinanAirController@getNewperizinan}}">Ajukan Izin</a></li>
						@if (Auth::check())
						<li><a href="PerizinanAirController@getNotifikasi">Notifikasi</a></li>
						@endif
						<!--<li><a href="PerizinanAirController@getNewperizinan">Perpanjang Izin</a></li>
					-->
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="topic">
			<div class="container">
				<div class="col-md-8">
					@yield('head')
					
				</div>
			</div>
			<div class="topic__infos">
			</div>
		</div>
	</div>
	
	@yield('content')
	
	<br><br><br><br><br><br><br><br><br><br>
	<div class="site-footer"><div class="container">
			<div class="copyright clearfix"><p><b>Aplikasi Perizinan Air</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{PerizinanAirController@getNewperizinan}}">Ajukan Izin</a>&nbsp;&bull;&nbsp;<p>&copy; 2015  Pemerintah Kota Bandung</p></div></div></div></div>
	</body>
</html>