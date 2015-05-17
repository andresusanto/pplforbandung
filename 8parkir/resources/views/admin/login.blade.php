<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin - Aplikasi Parkir dan Terminal</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admincss/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admincss/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{asset('admincss/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admincss/css/style-responsive.css')}}" rel="stylesheet">

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
            {!! Form::open(['route' => 'login_admin', 'role' => 'form', 'class' => 'form-login']) !!}
                <h2 class="form-login-heading">Login Admin</h2>
                <div class="login-wrap">
                    {!! Form::text('email', '',  ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => 'Masukan Email']) !!}
                    <br>
                    {!! Form::password('password',  ['class' => 'form-control', 'required', 'placeholder' => 'Masukan Password']) !!}
                    <br>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                    <hr>
                </div>
              </form>       
        
        </div>
      </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('admincss/js/jquery.js')}}"></script>
    <script src="{{asset('admincss/js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('admincss/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('admincss/img/login-bg.jpg')}}", {speed: 500});
    </script>

  </body>
</html>
