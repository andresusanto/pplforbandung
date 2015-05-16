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
		<div class="list-group-item active row text-center"><h3>Formulir Surat Izin Usaha Perdagangan (SIUP)</h3></div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama :</label>
			<div class="col-md-6">{{$formulir->nama_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Alamat Tempat Tinggal :</label>
			<div class="col-md-6">{{$formulir->alamat_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Tempat/Tanggal Lahir :</label>
			<div class="col-md-6">{{$formulir->tempat_lahir_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor Telepon/Fax :</label>
			<div class="col-md-6">{{$formulir->nomor_telepon_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor KTP/Paspor :</label>
			<div class="col-md-6">{{$formulir->nomor_ktp_pemilik}}</div>
		</div>
		<div class="list-group-item row"> 
			<label class="col-md-6">Kewarganegaraan :</label>
			<div class="col-md-6">{{$formulir->kewarganegaraan_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama Perusahaan :</label>
			<div class="col-md-6">{{$formulir->nama_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Alamat Perusahaan :</label>
			<div class="col-md-6">{{$formulir->alamat_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor Telepon/Fax :</label>
			<div class="col-md-6">{{$formulir->nomor_telepon_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Provinsi :</label>
			<div class="col-md-6">{{$formulir->provinsi_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kabupaten :</label>
			<div class="col-md-6">{{$formulir->kabupaten_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kecamatan :</label>
			<div class="col-md-6">{{$formulir->kecamatan_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kelurahan/Desa :</label>
			<div class="col-md-6">{{$formulir->kelurahan_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Status :</label>
			<div class="col-md-6">{{$formulir->status_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kodepos :</label>
			<div class="col-md-6">{{$formulir->kodepos_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor & Tanggal Akta :</label>
			<div class="col-md-6">{{$formulir->nomor_akta_pendirian}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor & Tanggal Pengesahan :</label>
			<div class="col-md-6">{{$formulir->nomor_pengesahan_pendirian}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor & Tanggal Akta :</label>
			<div class="col-md-6">{{$formulir->nomor_akta_perubahan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor & Tanggal Pengesahan :</label>
			<div class="col-md-6">{{$formulir->nomor_pengesahan_perubahan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Modal dan Nilai Kekayaan Bersih Perusahaan :</label>
			<div class="col-md-6">{{$formulir->modal_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Total NIlai Saham :</label>
			<div class="col-md-6">{{$formulir->total_saham}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nasional :</label>
			<div class="col-md-6">{{$formulir->persen_nasional}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Asing :</label>
			<div class="col-md-6">{{$formulir->persen_asing}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kelembagaan :</label>
			<div class="col-md-6">{{$formulir->kelembagaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kegiatan Usaha :</label>
			<div class="col-md-6">{{$formulir->kegiatan_usaha}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Barang/Jasa Dagangan Utama :</label>
			<div class="col-md-6">{{$formulir->dagangan_utama}}</div>
		</div>
		<br>
		<div class="row text-center centered">
			<div class="span5"></div>
			<a type="btn" href={{ URL::previous() }} class="text-center btn btn-success ">Back</a>
		</div>
	</div>
</div>
@stop