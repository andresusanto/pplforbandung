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
	<div class="list-group-item active row text-center"><h3>Formulir Izin Mendirikan Bangunan (IMB)</h3></div>

	<div class="list-group-item active row">Pemohon : </div>
	<div class="list-group-item row">
		<label class="col-md-6">Nama :</label>
		<div class="col-md-6">{{$formulir->nama_pemohon}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Pekerjaan/Jabatan :</label>
		<div class="col-md-6">{{$formulir->jabatan_pemohon}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Alamat :</label>
		<div class="col-md-6">{{$formulir->alamat_pemohon}}</div>
	</div>
	<div class="list-group-item active row">Tanah/Lahan : </div>
	<div class="list-group-item row">Lokasi : </div>
	<div class="list-group-item row">
		<label class="col-md-6">Kampung :</label>
		<div class="col-md-6">{{$formulir->lokasi_kampung_lahan}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Desa/Kelurahan :</label>
		<div class="col-md-6">{{$formulir->lokasi_kelurahan_lahan}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Kecamatan :</label>
		<div class="col-md-6">{{$formulir->lokasi_kecamatan_lahan}}</div>
	</div>
	<div class="list-group-item row">Tenaga Kerja : </div>
	<div class="list-group-item row">
		<label class="col-md-6">Status :</label>
		<div class="col-md-6">{{$formulir->status_lahan}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Nomor Surat Kepemilikan :</label>
		<div class="col-md-6">{{$formulir->nomor_surat_kepemilikan}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Luas Tanah :</label>
		<div class="col-md-6">{{$formulir->luas_tanah}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Nama Pemilik Tanah :</label>
		<div class="col-md-6">{{$formulir->nama_pemilik_lahan}}</div>
	</div>
	<div class="list-group-item active row">Bangunan : </div>>
	<div class="list-group-item row">
		<label class="col-md-6">Jumlah Lantai Bangunan :</label>
		<div class="col-md-6">{{$formulir->jumlah_lantai_bangunan}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Luas Lantai Dasar :</label>
		<div class="col-md-6">{{$formulir->luas_lantai_dasar}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Luas Lantai Atas :</label>
		<div class="col-md-6">{{$formulir->luas_lantai_atas}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Luas Bangunan Pelengkap :</label>
		<div class="col-md-6">{{$formulir->luas_bangunan_pelengkap}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Jumlah Luas Bangunan :</label>
		<div class="col-md-6">{{$formulir->jumlah_luas_bangunan}}</div>
	</div>
	<div class="list-group-item row">
		<label class="col-md-6">Rencana Fungsi Bangunan :</label>
		<div class="col-md-6">{{$formulir->rencana_fungsi_bangunan}}</div>
	</div>
	<br>
	<div class="row text-center centered">
		<div class="span5"></div>
		<a type="btn" href={{ URL::previous() }} class="text-center btn btn-success ">Back</a>
	</div>
</div>
</div>
@stop
