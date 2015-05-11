@extends('appAdmin')

@section('content')
    <?php 
		$bdg = ['Agro','Kimia','Logam','Alat Transportasi','Elektronika','Tekstil','Produk Tekstil','Mesin Elektronika & Aneka','Non-Formal'];
		$skl = ['Mikro','Kecil','Menengah'];
	?>
	<!-- Page Heading -->
	@foreach ($usahas as $usaha)
	<!-- Project One -->
	<div class="row">
		<div class="col-md-6">
			<a href="#">
				<img class="img-responsive" src= {{$usaha->imagepath}}>
			</a>
		</div>
		<div class="col-md-6">
			<h3>{{$usaha->nama}}</h3>
			<h4>Kategori: {{$bdg[$usaha->bidang]}}</h4>
			<h4>Alamat: {{$usaha->lokasi}}</h4>
            <h4>Nomor Telepon: {{$usaha->telepon}}</h4> <br>
			<a class="btn btn-theme03" href="/admin/{{$usaha->id}}">Lihat Data Lengkap&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
			&nbsp;&nbsp;
			<a class="btn btn-theme03" href="/edit-usaha-admin/{{$usaha->id}}">Ubah Data Usaha&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
			<br><br>
			<a class="btn btn-theme03" href="/pemberian-izin/{{$usaha->id}}">Berikan Izin&nbsp;<span class="glyphicon glyphicon-ok"></span></a>	
		</div>
	</div>
	<!-- /.row -->

	<hr>
	@endforeach

@endsection
