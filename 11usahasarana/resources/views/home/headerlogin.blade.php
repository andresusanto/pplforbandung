@include('home.global_variable')

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
				<?php echo "<img src=".asset("/img/logo2.png");?> class="img-circle" width="60" style="float: left">
				<a href="{{Route('login')}}" class="brand">Bandung Berusaha</
				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-cog"></i>
								Account
								<b class="caret"></b>
							</a>

							<ul class="dropdown-menu">
								<li><a href="{{$login}}">Login</a></li>
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
