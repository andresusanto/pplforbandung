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
		<div class="list-group-item active row text-center"><h3>Formulir Pengajuan Izin Gangguan (HO)</h3></div>

		<div class="list-group-item row">
			<label class="col-md-6" for="namaPengusaha">Nama Pengusaha :</label>
			<div class="col-md-6">{{$formulir->nama_pengusaha}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="alamatPengusaha">Alamat Pengusaha :</label>
			<div class="col-md-6">{{$formulir->alamat_pemilik}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="kebangsaan">Kebangsaan :</label>
			<div class="col-md-6">{{$formulir->kebangsaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="namaPerusahaan">Nama Perusahaan : </label>
			<div class="col-md-6">{{$formulir->nama_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="letakPerusahaan">Letak Perusahaan : </label>
			<div class="col-md-6">{{$formulir->letak_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="bentukPerusahaan">Bentuk Perusahaan : </label>
			<div class="col-md-6">{{$formulir->bentuk_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="statusPerusahaan">Status Perusahaan : </label>
			<div class="col-md-6">{{$formulir->status_perusahaan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="jenisUsaha">Jenis Usaha : </label>
			<div class="col-md-6">{{$formulir->jenis_usaha}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="permohonan">Permohonan : </label>
			<div class="col-md-6">{{$formulir->permohonan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="luasTanah">Luas Tanah : </label>
			<div class="col-md-6">{{$formulir->luas_tanah}}</div>
		</div>
		<div class="list-group-item active row">Batas-batas : </div>
		<div class="list-group-item row">
			<label class="col-md-6" for="batasUtara">Utara : </label>
			<div class="col-md-6">{{$formulir->batas_utara}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="batasTimur">Timur : </label>
			<div class="col-md-6">{{$formulir->batas_timur}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="batasSelatan">Selatan : </label>
			<div class="col-md-6">{{$formulir->batas_selatan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="batasBarat">Barat : </label>
			<div class="col-md-6">{{$formulir->batas_barat}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="luasBangunan">Luas Bangunan Perusahaan : </label>
			<div class="col-md-6">{{$formulir->luas_bangunan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="keadaanBangunan">Keadaan Bangunan : </label>
			<div class="col-md-6">{{$formulir->keadaan_bangunan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="statusTanah">Status Tanah Perusahaan: </label>
			<div class="col-md-6">{{$formulir->status_tanah}}</div>
		</div>
		<div class="list-group-item active row">Tenaga Kerja : </div>
		<div class="list-group-item row">Pribumi : </div>
		<div class="list-group-item row">
			<label class="col-md-6" for="pribumiPria">Laki-laki : </label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_pribumi_lk}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="pribumiWanita">Wanita : </label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_pribumi_pr}}</div>
		</div>

		<div class="list-group-item row">Asing : </div>

		<div class="list-group-item row">
			<label class="col-md-6" for="asingPria">Laki-laki : </label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_asing_lk}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="asingWanita">Wanita : </label>
			<div class="col-md-6">{{$formulir->jumlah_tenaga_kerja_asing_pr}}</div>
		</div>
		<div class="list-group-item active row"></div>

		<div class="list-group-item row">
			<label class="col-md-6" for="banyakPeralatan">Banyaknya Peralatan Mesin dan Tenaga Penggerak yang Dipergunakan : </label>
			<div class="col-md-6">{{$formulir->banyak_peralatan}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="sumberAir">Sumber Air yang Dipergunakan : </label>
			<div class="col-md-6">{{$formulir->sumber_air}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="jumlahJamKerja">Jumlah Jam Kerja : </label>
			<div class="col-md-6">{{$formulir->jumlah_jam_kerja}}</div>
		</div>
		<div class="list-group-item row">
			<label class="col-md-6" for="lainLain">Lain-lain :</label>
			<div class="col-md-6">{{$formulir->lain_lain}}</div>
		</div>
		<br>
		<div class="row text-center centered">
			<div class="span5"></div>
			<a type="btn" href={{ URL::previous() }} class="text-center btn btn-success ">Back</a>
		</div>
	</div>
</div>
@stop
