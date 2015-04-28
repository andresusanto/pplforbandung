<?php $jenis = 'all';?>
<?php $stats = 'admin';?>
<?php
    $json = DB::table('pengguna')->where('id',1)->first();
    $nama = $json->nama;
 ?>
@extends ('home.header')

@section ('content')
		<div class="col-xs-2">
			@include ('home.sidebar')
		</div>
		
		<div class="col-xs-10">
			<br><br><br><br><br><br>
			<h3> <p class ="text-center">Selamat datang {{$nama}} di dalam Aplikasi Izin Usaha dan Sarana Perdagangan</p> </h3>
			<br>
			<h4> <p class ="text-center">Anda sebagai Admin dapat melakukan perubahan status dari izin yang telah diajukan</p> </h4>
			<br><br>
			<h4> <p class ="text-center"> <span class="label label-info">Anda dapat memilih izin yang anda ingin setujui pada menu bagian kiri</span></p> </h4>
		</div>
	</div>
@endsection