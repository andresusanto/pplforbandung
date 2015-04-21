<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="{{ asset('assets-penduduk/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/pages/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/pages/signin.css') }}" rel="stylesheet" type="text/css">


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
                    <a class="brand" href="/">Kependudukan dan Pencatatan Sipil</a>
                </div> <!-- /container -->
            </div> <!-- /navbar-inner -->
        </div> <!-- /navbar -->
        <div class="main">

            <div class="main-inner">
                <div class="container">
                    <div class="account-container">
                        <div class="content clearfix">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h1>Halaman Masuk Penduduk</h1>
                                <div class="login-fields">
                                    <p>Mohon isi detil akun anda</p>
                                    <div class="field">
                                        <label for="username">Nomor Induk Kependudukan</label>
                                        <input type="text" id="username" name="email" value="putri@gmail.com" placeholder="Nomor Induk Kependudukan" class="login username-field">
                                    </div> <!-- /field -->
                                    <div class="field">
                                        <label for="password">Sandi</label>
                                        <input type="password" id="password" name="password" value="putriputri" placeholder="Sandi" class="login password-field">
                                    </div> <!-- /password -->
                                </div> <!-- /login-fields -->
                                <div class="login-actions">
                                    <button class="button btn btn-success btn-large">Masuk</button>
                                </div> <!-- .actions -->
                            </form>
                        </div> <!-- /content -->
                    </div> <!-- /account-container -->
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <!-- /main -->



        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="{{ asset('assets-penduduk/js/jquery-1.7.2.min.js') }}"></script> 
        <script src="{{ asset('assets-penduduk/js/excanvas.min.js') }}"></script> 
        <script src="{{ asset('assets-penduduk/js/chart.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets-penduduk/js/bootstrap.js') }}"></script>
        <script language="javascript" type="text/javascript" src="{{ asset('assets-penduduk/js/full-calendar/fullcalendar.min.js') }}"></script>

        <script src="{{ asset('assets-penduduk/js/base.js') }}"></script> 

        <script src="{{ asset('assets-penduduk/js/signin.js') }}"></script>
    </body>
</html>