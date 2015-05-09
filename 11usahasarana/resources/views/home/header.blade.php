<?php
//check if user has login or not
function redirection($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

$json = DB::table('pengguna')->where('id',1)->first();
$nama = $json->nama;

if($nama === 'current_username')
{
    //redirect
    redirection('http://localhost:8000/Admin');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bandung BerUsaha</title>

	<link href="{{ asset('/css/admin/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/style-responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/table-responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/to-do.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin/css/zabuto_calendar.css') }}" rel="stylesheet">
		
	<link rel='stylesheet' type='text/css' href='assets/js/gritter/css/jquery.gritter.css' />
	
	<!-- Fonts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
	<!--header start-->
	<header class="header black-bg">
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
		</div>
		<!--logo start-->
		<a href="{{route('adminhome')}}" class="logo"><b>Bandung BerUsaha</b></a>
		<!--logo end-->
		
		<div class="nav notify-row" id="top_menu">
			<!--  notification start -->
			<ul class="nav top-menu">
				<!-- settings start -->
				<li class="dropdown">
					{{--<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">--}}
						{{--<i class="fa fa-tasks"></i>--}}
						{{--<span class="badge bg-theme">4</span>--}}
					{{--</a>--}}
					<ul class="dropdown-menu extended tasks-bar">
						<div class="notify-arrow notify-arrow-green"></div>
						<li>
							<p class="green">You have 4 pending tasks</p>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">DashGum Admin Panel</div>
									<div class="percent">40%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Database Update</div>
									<div class="percent">60%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										<span class="sr-only">60% Complete (warning)</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Product Development</div>
									<div class="percent">80%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										<span class="sr-only">80% Complete</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Payments Sent</div>
									<div class="percent">70%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
										<span class="sr-only">70% Complete (Important)</span>
									</div>
								</div>
							</a>
						</li>
						<li class="external">
							<a href="#">See All Tasks</a>
						</li>
					</ul>
				</li>
				<!-- settings end -->
				
				<!-- inbox dropdown start-->
				<li id="header_inbox_bar" class="dropdown">
					{{--<a data-toggle="dropdown" class="dropdown-toggle" href="as#">--}}
						{{--<i class="fa fa-envelope-o"></i>--}}
						{{--<span class="badge bg-theme">5</span>--}}
					{{--</a>--}}
					<ul class="dropdown-menu extended inbox">
						<div class="notify-arrow notify-arrow-green"></div>
						<li>
							<p class="green">You have 5 new messages</p>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
								<span class="subject">
								<span class="from">Zac Snider</span>
								<span class="time">Just now</span>
								</span>
								<span class="message">
									Hi mate, how is everything?
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
								<span class="subject">
								<span class="from">Divya Manian</span>
								<span class="time">40 mins.</span>
								</span>
								<span class="message">
								 Hi, I need your help with this.
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
								<span class="subject">
								<span class="from">Dan Rogers</span>
								<span class="time">2 hrs.</span>
								</span>
								<span class="message">
									Love your new Dashboard.
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
								<span class="subject">
								<span class="from">Dj Sherman</span>
								<span class="time">4 hrs.</span>
								</span>
								<span class="message">
									Please, answer asap.
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">See all messages</a>
						</li>
					</ul>
				</li>
				<!-- inbox dropdown end -->
			</ul>
			
			<!--  notification end -->
		</div>
		<div class="top-menu">
			<ul class="nav pull-right top-menu">
				<li><a class="logout" href="{{route('logout_admin')}}">Logout</a></li>
			</ul>
		</div>
	</header>
	
	<!--
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class ="row">
			<div class ="col-md-1"> <?php echo "<img src=".asset("/img/logo.png"); ?> width ="90" height = "90"> </div>
			<div class ="col-md-10"> <a href ="<?php if ($stats == "admin") echo url('/Admin/izin'); else if ($stats == "user") echo url ('/izin');?>"> <h1><p class="text-center">Aplikasi Izin Usaha dan Sarana Perdagangan</p> </h1> </a></div>
			<div class ="col-md-1"> <?php echo "<img src=".asset("/img/logo2.png"); ?> width ="90" height = "90"> </div>
		</div>
		<div class ="row">
			<div class ="col-md-6 col-md-offset-3"> <h4> <p class="text-center"><?php if ($stats == "admin") echo 'Ini adalah Panel Admin'; else if ($stats == "user") echo 'Daftarkan Izin Usaha Anda Disini';?></p></h4></div>
		</div>
	  </div>
	</nav>
	
	-->
	<div class="row">
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>