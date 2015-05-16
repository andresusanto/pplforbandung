@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Formulir Izin Usaha Industri (IUI)</h3></div>

	<div class="panel-body">
		<div class="col-md-2">	</div>
		<div class="col-md-8">
			{!! Form::open(['url'=>"upload/iui", 'method'=>'PATCH', 'class'=>'form-horizontal'])!!}
				<br>
				<h4>Keterangan Pemohon</h4>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemohon" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_pemohon" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_telepon_pemohon" required>
					</div>
				</div>
				<h4>Keterangan Perusahaan</h4>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_telepon_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">NPWP :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="npwp" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="no_telepon_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Desa/Kelurahan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="lokasi_kelurahan_pabrik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kecamatan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="lokasi_kecamatan_pabrik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kabupaten :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="lokasi_kabupaten_pabrik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kepemilikan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kepemilikan_pabrik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Luas Bangunan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="luas_bangunan_pabrik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Luas Tanah :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="luas_tanah_pabrik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Mesin/Peralatan Utama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alat_utama_produksi" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Mesin/Peralatan Pembantu :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alat_pembantu_produksi" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Tenaga Penggerak :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="tenaga_penggerak" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Jenis Industri :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jenis_industri" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Komoditi :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="komoditi" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kapasitas Terpasang per Tahun :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kapasita_terpasang_per_tahun" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kebutuhan Baku/Penolong:</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kebutuhan_bahan_baku" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Laki-laki :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_pribumi_lk" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Wanita :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_pribumi_pr" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Laki-laki :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_asing_lk" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Wanita :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jumlah_tenaga_kerja_asing_pr" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nilai Investasi :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nilai_investasi" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Merek :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="merek" required>
					</div>
				</div>
				<<div class="form-group">
					<div class="col-md-offset-4 col-md-8">
						<button type="submit" class="text-center btn btn-success ">Submit</button>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="span3">	</div>
	</div>
</div>
@stop