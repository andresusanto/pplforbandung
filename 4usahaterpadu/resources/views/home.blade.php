@extends('layouts.masterfront')

@section('content')

	<p class="active" href="index.html" >
		<p class="centered"><a href=""><img src="{{asset('assets/img/logo_bandung.png') }}" class="" width="120"></a></p>
		<span>
		  	<h3 class="centered"><font color="white"><b>Badan Pelayanan Perizinan Terpadu</b></h3></font>
		</span>
		<div class = "text-center">
			<?php if(\Session::get('peran')==3){ ?>
			<a href="listperizinan" type="button" class="btn-lg centered btn btn-default">Mengajukan Izin  <i class="fa fa-angle-right"></i></a>
			<?php }else if(\Session::get('peran')==2){ ?>
			<a href="listformulir" type="button" class="btn-lg centered btn btn-default">Daftar Formulir Masuk  <i class="fa fa-angle-right"></i></a>
			<?php } else if(\Session::get('peran')==1){ ?>
			<a href="listformulir" type="button" class="btn-lg centered btn btn-default">Daftar Formulir Terverifikasi  <i class="fa fa-angle-right"></i></a>
			<?php } else{?>
			<a href="listperizinan" type="button" class="btn-lg centered btn btn-default">Mengajukan Izin <i class="fa fa-angle-right"></i></a>
			<?php } ?>
		</div>

	</p>

	<p>&nbsp;</p>
	<br><br>
	<h4><b>Profil</b></h4>
	<p class=" text-justify">
	  	Dalam upaya meningkatkan mutu pelayanan kepada masyarakat, pada tahun 2002 Pemerintah Kota Bandung  membentuk Badan Penanaman Modal dan Pelayanan Perizinan Terpadu (BPMPPT) sesuai dengan Peraturan Daerah Kota Bandung Nomor 12 Tahun 2007 tentang Pembentukan dan Susunan Organisasi Lembaga Teknis Daerah. Namun sejalan dengan waktu dan terus mengevaluasi pelaksanaan pelayanan publik khususnya pelayanan bidang perizinan bahwa lembaga Badan Penanaman Modal dan Pelayanan Perizinan Terpadu (BPMPPT) masih dirasakan kurang maksimal sehingga dengan terbitnya Peraturan Daerah Kota Bandung Nomor 12 Tahun 2009  yang mengacu pada Peraturan Menteri Dalam Negeri Nomor 20 Tahun 2008, pada akhir Tahun 2009 lembaga Badan Penanaman Modal dan Pelayanan Perizinan Terpadu dirubah menjadi Badan Pelayanan Perizinan Terpadu (BPPT) yang memiliki struktur lebih ramping sehingga diharapkan lebih dapat memangkas tentang kendala birokrasi.
		<p><a href="profil" type="button" class=" text-center btn btn-theme">Baca Selengkapnya <i class="fa fa-angle-right"></i> </a>
		</p>
	</p>
@endsection
