<?php $jenis = 'IzinUsahaTokoModern';?>
<?php $stats = 'admin';?>

@extends ('home.header')

@section ('content')
		<div class="col-xs-2">
			@include ('home.sidebar')
		</div>
		
		<div class="col-xs-9 col-offset-xs-1">
			<br><br><br><br><br><br>
			<h1> {{$judul}} </h1>
			@if (!isset($downloadLink))
				@include ('izin.admin.listizin')
			@else
				@include('izin.admin.listdownload')
			@endif
		</div>
	</div>
@endsection