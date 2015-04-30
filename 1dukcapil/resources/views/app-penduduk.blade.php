<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pendudukan dan Pencatatan Sipil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="{{ asset('assets-penduduk/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/pages/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-penduduk/css/pages/signin.css') }}" rel="stylesheet" type="text/css">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.html">
                        Penduduk dan Pencatatan Sipil                
                    </a>        
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">                       
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i> 
                                    {{ Auth::user()->email }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('user/logout') }}">Logout</a></li>
                                </ul>                       
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->    
                </div> <!-- /container -->
            </div> <!-- /navbar-inner -->
        </div>
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li>
                            <a href="http://www.pplbandung.biz.tm">
                                <i class="icon-dashboard"></i>
                                <span>Dashboard</span>
                            </a>                        
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="icon-list-alt"></i>
                                <span>Profil</span>
                            </a>                    
                        </li>
                        <li>
                            <a href="http://pajak.pplbandung.biz.tm">
                                <i class="icon-list-alt"></i>
                                <span>Pelayanan Pajak</span>
                            </a>                    
                        </li>
                        <li>
                            <a href="http://imb.pplbandung.biz.tm">
                                <i class="icon-list-alt"></i>
                                <span>IMB dan Izin Lokasi</span>
                            </a>                    
                        </li>
                        <li>
                            <a href="http://usahaterpadu.pplbandung.biz.tm">
                                <i class="icon-list-alt"></i>
                                <span>Izin Usaha Terpadu</span>
                            </a>                    
                        </li>
                        <li>
                            <a href="http://air.pplbandung.biz.tm">
                                <i class="icon-list-alt"></i>
                                <span>Izin Air</span>
                            </a>                    
                        </li>
                        <li>
                            <a href="http://usahasarana.pplbandung.biz.tm">
                                <i class="icon-list-alt"></i>
                                <span>Ijin Usaha dan Sarana Perdangangan</span>
                            </a>                    
                        </li>
                    </ul>
                </div> <!-- /container -->
            </div> <!-- /subnavbar-inner -->
        </div>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    @yield('content')
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <!-- /main -->

        <div class="footer">
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            © 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>.
                        </div> <!-- /span12 -->
                    </div> <!-- /row -->
                </div> <!-- /container -->
            </div> <!-- /footer-inner -->
        </div>

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

        @yield('script')

    </body>
</html>