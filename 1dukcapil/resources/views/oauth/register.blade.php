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
                            <form action="" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h1>Halaman Registrasi OAuth 2.0</h1>
                                <div class="login-fields">
                                    <p>Mohon isi formulir OAuth 2.0</p>
                                    <div class="field">
                                        <label for="username">Nama</label>
                                        <input type="text" id="name" name="name" placeholder="Name">
                                    </div> <!-- /field -->
                                    <div class="field">
                                        <label for="password">Redirect URI</label>
                                        <input type="text" id="redirect-uri" name="redirectUri" placeholder="Redirect URI">
                                    </div> <!-- /password -->
                                </div> <!-- /login-fields -->
                                <div class="login-actions">
                                    <button class="button btn btn-success btn-large">Daftar</button>
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