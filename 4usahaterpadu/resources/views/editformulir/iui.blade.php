@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Formulir Izin Usaha Industri (IUI)</h3></div>

	<div class="panel-body">
		<div class="col-md-2">	</div>
		<div class="col-md-8">
			{!! Form::open(['url'=>"editformulir/iui/".$formulir->id, 'method'=>'PATCH', 'class'=>'form-horizontal'])!!}
				<br>
				<h4>Keterangan Pemohon</h4>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemohon" value="{{$formulir->nama_pemohon}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_pemohon" value="{{$formulir->alamat_pemohon}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_telepon_pemohon" value="{{$formulir->nomor_telepon_pemohon}}" required>
					</div>
				</div>
				<h4>Keterangan Perusahaan</h4>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_perusahaan" value="{{$formulir->nama_perusahaan}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_perusahaan" value="{{$formulir->alamat_perusahaan}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_telepon_perusahaan" value="{{$formulir->nomor_telepon_perusahaan}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">NPWP :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="npwp" value="{{$formulir->npwp}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemilik" value="{{$formulir->nama_pemilik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_pemilik" value="{{$formulir->alamat_pemilik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="no_telepon_pemilik" value="{{$formulir->no_telepon_pemilik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Desa/Kelurahan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="lokasi_kelurahan_pabrik" value="{{$formulir->lokasi_kelurahan_pabrik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kecamatan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="lokasi_kecamatan_pabrik" value="{{$formulir->lokasi_kecamatan_pabrik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kabupaten :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="lokasi_kabupaten_pabrik" value="{{$formulir->lokasi_kabupaten_pabrik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kepemilikan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kepemilikan_pabrik" value="{{$formulir->kepemilikan_pabrik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Luas Bangunan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="luas_bangunan_pabrik" value="{{$formulir->luas_bangunan_pabrik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Luas Tanah :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="luas_tanah_pabrik" value="{{$formulir->luas_tanah_pabrik}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Mesin/Peralatan Utama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alat_utama_produksi" value="{{$formulir->alat_utama_produksi}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Mesin/Peralatan Pembantu :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alat_pembantu_produksi" value="{{$formulir->alat_pembantu_produksi}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Tenaga Penggerak :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="tenaga_penggerak" value="{{$formulir->tenaga_penggerak}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Jenis Industri :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jenis_industri" value="{{$formulir->jenis_industri}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Komoditi :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="komoditi" value="{{$formulir->komoditi}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kapasitas Terpasang per Tahun :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kapasita_terpasang_per_tahun" value="{{$formulir->kapasita_terpasang_per_tahun}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kebutuhan Baku/Penolong:</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kebutuhan_bahan_baku" value="{{$formulir->kebutuhan_bahan_baku}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Laki-laki :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_pribumi_lk" value="{{$formulir->jumlah_tenaga_kerja_pribumi_lk}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Wanita :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_pribumi_pr" value="{{$formulir->jumlah_tenaga_kerja_pribumi_pr}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Laki-laki :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_asing_lk" value="{{$formulir->jumlah_tenaga_kerja_asing_lk}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Wanita :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_asing_pr" value="{{$formulir->jumlah_tenaga_kerja_asing_pr}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nilai Investasi :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nilai_investasi" value="{{$formulir->nilai_investasi}}" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Merek :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="merek" value="{{$formulir->merek}}" required>
					</div>
				</div>
				<<div class="form-group">
					<div class="col-md-offset-4 col-md-8">
						<button type="submit" class="text-center btn btn-success ">Save</button>
						<a type="btn" href={{ URL::previous() }} class="text-center btn btn-success ">Cancel</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="span3">	</div>
	</div>
</div>
@stop