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
		<div class="list-group-item active row text-center"><h3>Formulir Izin Usaha Industri (IUI)</h3></div>
		<div class="list-group-item active row">Pemohon : </div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama :</label>
			<div class="col-md-6">{{$formulir->nama_pemohon}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Alamat :</label>
			<div class="col-md-6">{{$formulir->alamat_pemohon}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor Telepon :</label>
			<div class="col-md-6">{{$formulir->nomor_telepon_pemohon}}</div>
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
			<label class="col-md-6">Nomor Telepon Perusahaan :</label>
			<div class="col-md-6">{{$formulir->nomor_telepon_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">NPWP :</label>
			<div class="col-md-6">{{$formulir->npwp}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nama Pemilik :</label>
			<div class="col-md-6">{{$formulir->nama_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Alamat Pemilik :</label>
			<div class="col-md-6">{{$formulir->alamat_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nomor Telepon Pemilik :</label>
			<div class="col-md-6">{{$formulir->no_telepon_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Desa/Kelurahan :</label>
			<div class="col-md-6">{{$formulir->lokasi_kelurahan_pabrik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kecamatan :</label>
			<div class="col-md-6">{{$formulir->lokasi_kecamatan_pabrik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kabupaten :</label>
			<div class="col-md-6">{{$formulir->lokasi_kabupaten_pabrik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kepemilikan :</label>
			<div class="col-md-6">{{$formulir->kepemilikan_pabrik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Luas Bangunan :</label>
			<div class="col-md-6">{{$formulir->luas_bangunan_pabrik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Luas Tanah :</label>
			<div class="col-md-6">{{$formulir->luas_tanah_pabrik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Mesin/Peralatan Utama :</label>
			<div class="col-md-6">{{$formulir->alat_utama_produksi}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Mesin/Peralatan Pembantu :</label>
			<div class="col-md-6">{{$formulir->alat_pembantu_produksi}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Tenaga Penggerak :</label>
			<div class="col-md-6">{{$formulir->tenaga_penggerak}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Jenis Industri :</label>
			<div class="col-md-6">{{$formulir->jenis_industri}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Komoditi :</label>
			<div class="col-md-6">{{$formulir->komoditi}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kapasitas Terpasang per Tahun :</label>
			<div class="col-md-6">{{$formulir->kapasita_terpasang_per_tahun}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Kebutuhan Baku/Penolong:</label>
			<div class="col-md-6">{{$formulir->kebutuhan_bahan_baku}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Laki-laki :</label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_pribumi_lk}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Wanita :</label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_pribumi_pr}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Laki-laki :</label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_asing_lk}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Wanita :</label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_asing_pr}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Nilai Investasi :</label>
			<div class="col-md-6">{{$formulir->nilai_investasi}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6">Merek :</label>
			<div class="col-md-6">{{$formulir->merek}}</div>
		</div>
		<br>
		<div class="row text-center centered">
			<div class="span5"></div>
			<a type="btn" href={{ URL::previous() }} class="text-center btn btn-success ">Back</a>
		</div>
	</div>
</div>
@stop
