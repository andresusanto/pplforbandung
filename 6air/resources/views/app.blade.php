<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Perizinan Air-User</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   
    
    <link href="{{ asset('css/pages/faq.css') }}" rel="stylesheet"> 

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
			
			<a class="brand" href="{{ url('/') }}">
				Perizinan Air				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/sso') }}">Login Pemohon</a></li>
						<li><a href="{{ url('/auth/login') }}">Login Dinas</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<!--<li><a href="#">Notifikasi (0)</a></li>-->
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			
				<form class="navbar-search pull-right" action="{{ action('MasyarakatController@postCari') }}" method="POST">
					<input type="text" name="cari" class="search-query" placeholder="Cari Izin">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
@if (isset($dinas))
<div class="subnavbar">
<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
			
				<li{{ isset($nav_masuk) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getHomedinas') }}">
						<i class="icon-star"></i>
						<span>Permohonan Izin Baru</span>
					</a>    				
				</li>
				<li{{ isset($nav_renew) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getListperpanjangan') }}">
						<i class="icon-list"></i>
						<span>Perpanjangan Izin</span>
					</a>    				
				</li>
				<li{{ isset($nav_ubah) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getListperubahan') }}">
						<i class="icon-th-list"></i>
						<span>Perubahan Izin</span>
					</a>    				
				</li>
				<li{{ isset($nav_keberatan) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getListkeberatan') }}">
						<i class="icon-exclamation"></i>
						<span>Daftar Keberatan</span>
					</a>    				
				</li>
				<li{{ isset($nav_list) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getListdinas') }}">
						<i class="icon-list-alt"></i>
						<span>Perizinan Aktif</span>
					</a>    				
				</li>
				<li{{ isset($nav_pengaduan) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getListpengaduan') }}">
						<i class="icon-exclamation-sign"></i>
						<span>Daftar Pengaduan</span>
					</a>    				
				</li>
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->
</div> 
@else
<div class="subnavbar">
<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
			
				<li{{ isset($nav_home) ? ' class=active' : '' }}>
					<a href="{{ url('/') }}">
						<i class="icon-home"></i>
						<span>Beranda</span>
					</a>	    				
				</li>	
				<li{{ isset($nav_pengajuan) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getNewperizinan') }}">
						<i class="icon-list-alt"></i>
						<span>Pengajuan Izin</span>
					</a>    				
				</li>
				<li{{ isset($nav_list) ? ' class=active' : '' }}>
					<a href="{{ action('PerizinanAirController@getListperizinan') }}">
						<i class="icon-list"></i>
						<span>Perizinan Anda</span>
					</a>    				
				</li>
				<li{{ isset($nav_pengaduan) ? ' class=active' : '' }}>
					<a href="{{ action('PengaduanController@getIndex') }}">
						<i class="icon-exclamation-sign"></i>
						<span>Pengaduan</span>
					</a>    				
				</li>
				<li{{ isset($nav_faq) ? ' class=active' : '' }}>
					<a href="#">
						<i class="icon-question-sign"></i>
						<span>FAQ</span>
					</a>    				
				</li>
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->
@endif

@yield('content')

    
<div class="extra">

	<div class="extra-inner">

		<div class="container">

			<div class="row">
                <div class="span3">
                    <h4>Pengajuan Izin Baru</h4>
                    <ul>
                        <li><a href="{{ action('PerizinanAirController@getNewperizinan') }}">Form Perizinan Baru</a></li>
                    </ul>
                </div>
                <div class="span3">
                    <h4>Perizinan Anda</h4>
                    <ul>
                        <li><a href="{{ action('PerizinanAirController@getListperizinan') }}">Daftar Perizinan</a></li>
                    </ul>
                </div>
                <div class="span3">
                    <h4>Pengaduan</h4>
                    <ul>
                        <li><a href="{{ action('PengaduanController@getIndex') }}">Form Pengaduan</a></li>
                    </ul>
                </div>
            </div> <!-- /row -->
		</div> <!-- /container -->
	</div> <!-- /extra-inner -->
</div> <!-- /extra -->
    
<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				&copy; 2015 <a href="http://air.pplbandung.biz.tm/">Aplikasi Perizinan Air Kota Bandung</a>.
    			</div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->
    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/faq.js') }}"></script>

<script>

$(function () {
	
	$('.faq-list').goFaq ();

});

</script>
  </body>

</html>

	