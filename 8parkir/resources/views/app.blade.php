<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Aplikasi Parkir dan Terminal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{asset('usercss/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('usercss/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{asset('usercss/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('usercss/css/style.css')}}" rel="stylesheet">
<link href="{{asset('usercss/css/pages/dashboard.css')}}" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
    <img class="brand" src="{{asset('image/logo-pemkot-bandung.png')}}" width="50" height="35"></img>
    <a class="brand" href="#">Aplikasi Parkir dan Terminal</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> {{Session::get('user')->nama_penduduk}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::route('logoutsso')}}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
      	@yield('navbar')
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        @yield('content')
      </div>
      <!-- /row --> 
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
        <div class="span12"> &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{asset('usercss/js/jquery-1.7.2.min.js')}}"></script> 
<script src="{{asset('usercss/js/excanvas.min.js')}}"></script> 
<script src="{{asset('usercss/js/chart.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('usercss/js/bootstrap.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('usercss/js/full-calendar/fullcalendar.min.js')}}"></script>
 
<script src="{{asset('js/base.js')}}"></script> 
@yield('script')
</body>
</html>

