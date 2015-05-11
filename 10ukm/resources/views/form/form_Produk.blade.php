@extends('app')

@section('content')

	<h1>Registrasi Produk</h1>
	<p>Mohon isikan setiap field demi kelancaran registrasi usaha</p>
	<hr>

	{!! Form::open(['url'=>'tambahproduk/' . $id_usaha]) !!}
		<div class="form-group">
			{!! Form::label('nama','Nama Produk:') !!}
			{!! Form::text('nama', null, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
			{!! Form::label('jenis','Jenis Produk:') !!}
			{!! Form::select('jenis', array(
			'0' => 'Makanan',
			'1' => 'Minuman',
			'2' => 'Bahan-Kimia',
			'3' => 'Elektronik',
			'4' => 'Kerajinan',
			'5' => 'Logam',
			'6' => 'Transportasi',
			'7' => 'Tekstil',
			'8' => 'Lain-lain' )) !!}
		</div>

		<div class="form-group">
			{!! Form::label('deskripsi','Deskripsi Produk:') !!}
			{!! Form::textArea('deskripsi', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group" hidden="true">
			{!! Form::label('id_usaha','id_ukm_terkait') !!}
			{!! Form::text('id_usaha',$id_usaha,['class' => 'form-control']) !!}
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