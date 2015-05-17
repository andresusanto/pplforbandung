<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('dashgum/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ URL::asset('dashgum/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashgum/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashgum/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashgum/lineicons/style.css') }}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('dashgum/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashgum/css/style-responsive.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('dashgum/js/chart-master/Chart.js') }}"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
    @include('petugas.header')
    @include('petugas.sidebar')

     <!--main content start-->
      <section id="main-content">
          @yield('content')
      </section><!-- /MAIN CONTENT -->
      

    @include('petugas.footer')

  </section> <!-- /container -->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('dashgum/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('dashgum/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ URL::asset('dashgum/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('dashgum/js/jquery.dcjqaccordion.2.7.js') }}" class="include" type="text/javascript"></script>
    <script src="{{ URL::asset('dashgum/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('dashgum/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('dashgum/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ URL::asset('dashgum/js/common-scripts.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::asset('dashgum/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dashgum/js/gritter-conf.js') }}"></script>

    <!--script for this page-->
    <script src="{{ URL::asset('dashgum/js/sparkline-chart.js') }}"></script>    
    <script src="{{ URL::asset('dashgum/js/zabuto_calendar.js') }}"></script>    
</html>