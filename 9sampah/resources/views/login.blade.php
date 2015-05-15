<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Trash Sure - Pengatur Sampah Kota Bandung</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

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
	      <form class="form-login" method="post" action="/login">
        	<h2 class="form-login-heading">login</h2>
        	<div class="login-wrap">
            	<input name="_token" hidden value="{!! csrf_token() !!}" />
            	<input type="input" class="form-control" id="username" placeholder="Enter username" name="username">
            	<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                <font color="red"> 
                  <?php echo Session::pull('notification'); ?>
                </font><br><br>
                <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
            <hr>
        	</div>
  		  </form>	  	
	  	</div>
	  </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('img/login-bg-ts.jpg')}}", {speed: 500});
    </script>


  </body>
</html>
