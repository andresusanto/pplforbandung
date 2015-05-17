<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="{{ URL::asset('/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/pages/dashboard.css') }}" rel="stylesheet">
@yield('extracss')


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@include('wp.navbar_user')
@include('wp.subnavbar')

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



@include('footer')

<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ URL::asset('/js/jquery-1.7.2.min.js') }}"></script> 
<script src="{{ URL::asset('/js/excanvas.min.js') }}"></script> 
<script src="{{ URL::asset('/js/chart.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('/js/bootstrap.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ URL::asset('/js/full-calendar/fullcalendar.min.js') }}"></script>
 
<script src="{{ URL::asset('/js/base.js') }}"></script> 

@yield('extrajs')
</body>
</html>
