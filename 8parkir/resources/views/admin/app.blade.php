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
    <link rel="stylesheet" type="text/css" href="{{asset('admincss/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admincss/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admincss/lineicons/style.css')}}">    
    
    <!-- Custom styles for this template -->
    <link href="{{asset('admincss/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admincss/css/style-responsive.css')}}" rel="stylesheet">

    <script src="{{asset('admincss/js/chart-master/Chart.js')}}"></script>
    
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
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>Admin - Aplikasi Parkir dan Terminal</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{URL::route('admin/logout')}}">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><img src="{{asset('image/logo-pemkot-bandung.png')}}" width="60"></a></p>
                  <h5 class="centered">{{$admin->name}}</h5>

                  @yield('sidebar')

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
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
      <footer class="site-footer">
          <div class="text-center">
              2015 - pplbandung.biz.tm
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('admincss/js/jquery.js')}}"></script>
  <script src="{{asset('admincss/js/jquery-1.8.3.min.js')}}"></script>
  <script src="{{asset('admincss/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('admincss/js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('admincss/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('admincss/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('admincss/js/jquery.sparkline.js')}}"></script>


  <!--common script for all pages-->
  <script src="{{asset('admincss/js/common-scripts.js')}}"></script>
  
  <script type="text/javascript" src="{{asset('admincss/js/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('admincss/js/gritter-conf.js')}}"></script>

  <!--script for this page-->
  <script src="{{asset('admincss/js/sparkline-chart.js')}}"></script>    
  <script src="{{asset('admincss/js/zabuto_calendar.js')}}"></script> 

  @yield('script')

  </body>
</html>
