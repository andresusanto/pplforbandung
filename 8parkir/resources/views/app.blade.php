<!DOCTYPE html>

<html>


<head>
	<title>Parkir dan Terminal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="{{asset('bootflat/css/bootstrap.min.css')}}">

	@yield('head')

</head>

<body>

<!-- template navigasi bar halaman -->
	
	  <div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Parkir dan Terminal</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  @yield('admin')
			  @yield('guest')
			</div>
		  </div>
		</nav>
	  </div>
<!-- selesai navigasi bar halaman -->
	@yield('content')
	
	@yield('script')
	<script src="{{asset('bootflat/js/jquery.js')}}"></script>
	<script src="{{asset('bootflat/js/bootstrap.min.js')}}"></script>

</body>

</html>