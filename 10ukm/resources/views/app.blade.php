<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website UKM dan Industri Perdagangan Kota Bandung</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- <link href="{{ asset('/css/1-col-portfolio.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('/userAssets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/userAssets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/userAssets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/userAssets/css/pages/plans.css')}}" rel="stylesheet">
	
   <!--  <link href="{{ asset('/adminAssets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" /> -->
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-inner">
            <div class="container">
            
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <a class="brand" href="/daftar-usaha">
                    Nomaden <br/>
					Aplikasi Pengelolaan UKM/INDAG Kota Bandung
                </a>        
                
                <div class="navbar-search pull-right">
                    {!! Form::open(['url'=>'/search']) !!}
                    {!! Form::text('query', null, array( 'placeholder' => 'Search' )) !!}
                    {!! Form::submit('Search') !!}
                    {!! Form::close() !!}
                </div>
           
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
  
    </nav>

    <div class="subnavbar">

    <div class="subnavbar-inner">
    
        <div class="container">

            <ul class="mainnav">
            
                <li>
                    <a href="http://www.pplbandung.biz.tm/">
                        <i class="fa fa-tachometer"></i>
                        <span>Dashboard</span>
                    </a>                        
                </li> 
                
                <li>
                    <a href="/getlaporan">
                        <i class="fa fa-book"></i>
                        <span>Laporan Usaha</span>
                    </a>                    
                </li>
                
                <li>                    
                    <a href="/registrasi-usaha">
                        <i class="fa fa-paper-plane"></i>
                        <span>Registrasi UKM</span>
                    </a>                                    
                </li>

                 <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> 
                        <i class="icon-long-arrow-down"></i>
                        <span>Kategori</span> 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/sort/0">Agro</a></li>
                        <li><a href="/sort/1">Kimia</a></li>
                        <li><a href="/sort/2">Logam</a></li>
                        <li><a href="/sort/3">Alat Transportasi</a></li>
                        <li><a href="/sort/4">Elektronika</a></li>
                        <li><a href="/sort/5">Tekstil</a></li>
                        <li><a href="/sort/6">Produk Tekstil</a></li>
                        <li><a href="/sort/7">Mesin Elektronika dan Aneka</a></li>
                        <li><a href="/sort/8">Non-Formal</a></li>
                    </ul>
                </li>
            </ul>

        </div> <!-- /container -->
    
    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
	<hr>
	<!-- Page Content -->
    <div class="container">
		@yield('content')
		<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
	</div>
    <!-- /.container -->

	<!-- Scripts -->


	@yield('script')
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <div class="extra">

    <div class="extra-inner">

        <div class="container">

            <div class="row">
                    <div class="span3">
                        <h4>
                            Team Member</h4>
                        <ul>
                            <li><a href="javascript:;">Jais Anasrulloh Ja'fari</a></li>
                            <li><a href="javascript:;">Stanley Santoso</a></li>
                            <li><a href="javascript:;">Mario Tressa Jusar</a></li>
                            <li><a href="javascript:;">Andarias Silvanus</a></li>
							<li><a href="javascript:;">Aladyka Mushtofa</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                           Ketentuan</h4>
                        <ul>
                            <li>Anda Harus Login Dahulu sebelum entri data ukm</li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Also Visit Another Page</h4>
                        <ul>
                            <li><a href="http://dukcapil.pplbandung.biz.tm/">Dukcapil</a></li>
                            <li><a href="http://sampah.pplbandung.biz.tm/">Sampah</a></li>
                            <li><a href="http://parkir.pplbandung.biz.tm/">Parkir</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <h4>
                           Contact</h4>
                        <ul>
                            <li>ukmbandung@gmail.com</li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /extra-inner -->

</div> <!-- /extra -->


    
    
<div class="footer">
    
    <div class="footer-inner">
        
        <div class="container">
            
            <div class="row">
                
                <div class="span12">
                    &copy; 2013 <a href="http://www.egrappler.com/">Copyright &copy; Nomaden Team</a>.
                </div> <!-- /span12 -->
                
            </div> <!-- /row -->
            
        </div> <!-- /container -->
        
    </div> <!-- /footer-inner -->
    
</div> <!-- /footer -->
</body>
</html>
