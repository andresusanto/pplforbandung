<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Pendudukan dan Pencatatan Sipil</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets-admin/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets-admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-admin/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-admin/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-admin/lineicons/style.css') }}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style-responsive.css') }}" rel="stylesheet">

    <script src="{{ asset('assets-admin/js/chart-master/Chart.js') }}"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      @include('app-admin.header');
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      @include('app-admin.sidebar');
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              @yield('content')
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      @include('app-admin.footer')
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets-admin/js/jquery.js') }}"></script>
    <script src="{{ asset('assets-admin/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets-admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets-admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets-admin/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('assets-admin/js/common-scripts.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets-admin/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-admin/js/gritter-conf.js') }}"></script>
    @yield('script')

  </body>
</html>
