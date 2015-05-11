@extends('app')

@section('content')

	<h1>Edit UKM</h1>
	<hr>

	{!! Form::open(['url'=>'gantiusaha/' . $usaha->id]) !!}
		<div class="form-group">
			{!! Form::label('nama','Nama Perusahaan:') !!}
			{!! Form::text('nama', $usaha->nama, ['class' => 'form-control']) !!}
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
			), $usaha->bidang) !!}
		</div>
		<div class="form-group">
			{!! Form::label('skala','Skala Usaha:') !!}
			{!! Form::select('skala', array(
			'0' => 'Mikro',
			'1' => 'Kecil',
			'2' => 'Menengah'),$usaha->skala) !!}
		</div>
		<div class="form-group">
			{!! Form::label('lokasi','Alamat Perusahaan:') !!}
			{!! Form::text('lokasi', $usaha->lokasi, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('email','Email Perusahaan:') !!}
			{!! Form::text('email', $usaha->email, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('telepon','Nomor Telepon:') !!}
			{!! Form::text('telepon', $usaha->telepon, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Simpan',['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

@endsection

@section('script')
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
@endsection