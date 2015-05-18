<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Petugas - Masuk</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('dashgum/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ URL::asset('dashgum/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('dashgum/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashgum/css/style-responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="{{Request::url()}}/login" method="post">
		        <h2 class="form-login-heading">masuk petugas</h2>
		        <div class="login-wrap">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <input type="text" name="username" class="form-control" placeholder="Username Petugas" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Sandi">
		            <br>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Masuk </button>		
		        </div>		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('dashgum/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('dashgum/js/bootstrap.min.js') }}"></script>

  </body>
</html>
