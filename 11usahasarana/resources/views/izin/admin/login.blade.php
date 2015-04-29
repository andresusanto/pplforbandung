<?php $jenis = 'all';?>
<?php $stats = 'admin';?>

@extends ('home.header_login')

@section ('content')
		<div class="col-xs-2">
			@include ('home.sidebar_login')
		</div>
		
		<div class="col-xs-10">
			<br><br><br><br><br><br>
			<h3> <p class ="text-center">Selamat datang di dalam Aplikasi Izin Usaha dan Sarana Perdagangan</p> </h3>
			<br>
			<h4> <p class ="text-center">Anda sebagai Admin dapat melakukan perubahan status dari izin yang telah diajukan</p> </h4>
			<br><br>
			<h4> <p class ="text-center"><a href="{{route('login_admin_1')}}"><span style="padding: 10px" class="label label-info">Silakan Login</span></a></p> </h4>
		</div>
	</div>
@endsection