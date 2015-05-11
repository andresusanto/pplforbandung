@extends('app')

@section('content')

	<h1>Registrasi UKM</h1>
	<p>Mohon isikan setiap field demi kelancaran registrasi usaha</p>
	<hr>

	{!! Form::open(['url'=>'daftar-usaha', 'files' => true]) !!}
		<div class="form-group">
			{!! Form::label('nama','Nama Perusahaan:') !!}
			{!! Form::text('nama', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('bidang','Kategori Usaha:') !!}
			{!! Form::select('bidang', array(
			'0' => 'Agro',
			'1' => 'Kimia',
			'2' => 'Logam',
			'3' => 'Alat Transportasi',
			'4' => 'Elektronika',
			'5' => 'Tekstil',
			'6' => 'Produk Tekstil',
			'7' => 'Mesin Elektronika dan Aneka',
			'8' => 'Non-Formal'
			)) !!}
		</div>
		<div class="form-group">
			{!! Form::label('skala','Skala Usaha:') !!}
			{!! Form::select('skala', array(
			'0' => 'Mikro',
			'1' => 'Kecil',
			'2' => 'Menengah')) !!}
		</div>
		<div class="form-group">
			{!! Form::label('lokasi','Alamat Perusahaan:') !!}
			{!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email Perusahaan:') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('telepon','Nomor Telepon:') !!}
			{!! Form::text('telepon', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('image','Logo / Foto :') !!}
			{!! Form::file('image', null)!!}
		</div>
		<div class="form-group">
			{!! Form::label('izinusaha','Permohonan Izin Usaha :') !!}
			{!! Form::file('izinusaha', null)!!}
		</div>
		<div class="form-group">
			{!! Form::label('kepemilikan','Kepemilikan Tempat :') !!}
			{!! Form::file('kepemilikan', null)!!}
		</div>
		<div class="form-group">
			{!! Form::label('keteranganlokasi','Keterangan Lokasi :') !!}
			{!! Form::file('keteranganlokasi', null)!!}
		</div>
		<div class="form-group">
			{!! Form::label('pbb','Bukti Lunas PBB :') !!}
			{!! Form::file('pbb', null)!!}
		</div>
		<div class="form-group">
			{!! Form::label('gangguan','Izin Gangguan :') !!}
			{!! Form::file('gangguan', null)!!}
		</div>
		<div class="form-group">
			{!! Form::label('sumpah','Surat Sumpah :') !!}
			{!! Form::file('sumpah', null)!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Daftar',['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

@endsection

@section('script')
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
@endsection