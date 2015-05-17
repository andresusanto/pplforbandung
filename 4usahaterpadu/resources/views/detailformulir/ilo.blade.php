@extends("layouts.masterfront")
@section('content')
<div class="col-md-2">	</div>
<div class="col-md-8">
	<?php if(\Session::has('peran') && (\Session::get('peran')!=3)) {?>
	<div class="list-group">	
		<div class="list-group-item active row text-center"><h3>Data Akun Pemohon</h3></div>

		<div class="list-group-item row">
			<label class="col-md-6" for="namaPengusaha">Nama :</label>
			<div class="col-md-6">{{$pemohon->nama}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="namaPengusaha">Email :</label>
			<div class="col-md-6">{{$pemohon->email}}</div>
		</div>
	</div>
	<br>
	<?php } ?>
	<div class="list-group">
		<div class="list-group-item active row text-center"><h3>Formulir Izin Lokasi (ILO)</h3></div>

		<div class="list-group-item active row">Pemohon : </div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama :</label>
			<div class="col-md-6">{{$formulir->nama_pemohon}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Jabatan :</label>
			<div class="col-md-6">{{$formulir->jabatan_pemohon}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Alamat :</label>
			<div class="col-md-6">{{$formulir->alamat_pemohon}}</div>
		</div>
		<div class="list-group-item active row">Perusahaan : </div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama Perusahaan :</label>
			<div class="col-md-6">{{$formulir->nama_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Alamat Perusahaan :</label>
			<div class="col-md-6">{{$formulir->alamat_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Akta Pendirian :</label>
			<div class="col-md-6">{{$formulir->akta_pendirian}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">NPWP :</label>
			<div class="col-md-6">{{$formulir->npwp}}</div>
		</div>
		<div class="list-group-item active row">Lokasi: </div>
		<div class="list-group-item row">
			<label class="col-md-6">Luas :</label>
			<div class="col-md-6">{{$formulir->luas_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Blok :</label>
			<div class="col-md-6">{{$formulir->letak_blok_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Desa/Kelurahan :</label>
			<div class="col-md-6">{{$formulir->letak_kelurahan_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kecamatan :</label>
			<div class="col-md-6">{{$formulir->letak_kecamatan_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kondisi Saat Ini :</label>
			<div class="col-md-6">{{$formulir->kondisi_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor Persil :</label>
			<div class="col-md-6">{{$formulir->nomor_persil}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama Pemilik :</label>
			<div class="col-md-6">{{$formulir->nama_pemilik}}</div>
		</div>
		<br>
		<div class="row text-center centered">
			<div class="span5"></div>
			<a type="btn" href={{ URL::previous() }} class="text-center btn btn-success ">Back</a>
		</div>
	</div>
</div>
@stop