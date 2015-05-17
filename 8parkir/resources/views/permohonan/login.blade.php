<!DOCTYPE html>
	<html lang="en">
	  
	<head>
    <meta charset="utf-8">
    <title>Aplikasi Parkir dan Terminal</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
	    
	<link href="{{asset('usercss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('usercss/css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('usercss/css/font-awesome.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	    
	<link href="{{asset('usercss/css/style.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('usercss/css/pages/signin.css')}}" rel="stylesheet" type="text/css">

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
				
				<a class="brand" href="#">
					Aplikasi Parkir dan Terminal				
				</a>		
				
				<div class="nav-collapse">
					
				</div><!--/.nav-collapse -->	
		
			</div> <!-- /container -->
			
		</div> <!-- /navbar-inner -->
		
	</div> <!-- /navbar -->



	<div class="account-container">
		
		<div class="content clearfix">
			
			<form action="#" method="post">
			
				<h1>User Login</h1>		
				
				<div class="login-fields">
					
					<p>Anda harus login terlebih dahulu</p>
					
				</div> <!-- /login-fields -->
				
				<div class="login-actions">

					<a class="button btn btn-success btn-large" href="http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=lD0TANrJBzIkTT1i&redirect_uri=http://parkir.pplbandung.biz.tm/loginsso&response_type=code">login</a>
					
				</div> <!-- .actions -->
				
				
				
			</form>
			
		</div> <!-- /content -->
		
	</div> <!-- /account-container -->


	<script src="{{asset('usercss/js/jquery-1.7.2.min.js')}}"></script>
	<script src="{{asset('usercss/js/bootstrap.js')}}"></script>

	<script src="{{asset('usercss/js/signin.js')}}"></script>

	</body>

	</html>
