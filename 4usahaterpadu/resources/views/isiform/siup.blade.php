@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Formulir Surat Izin Usaha Perdagangan (SIUP)</h3></div>
	<br>
	<div class="panel-body">
		<div class="col-md-2">	</div>
			{!! Form::open(['url'=>"upload/siup", 'method'=>'PATCH', 'class'=>'form-horizontal'])!!}
		<div class="col-md-8">
				<br>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat Tempat Tinggal :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Tempat/Tanggal Lahir :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="tempat_lahir_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Telepon/Fax :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_telepon_pemilik" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor KTP/Paspor :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_ktp_pemilik" required>
					</div>
				</div>
				<div class="row form-group"> 
					<label class="col-md-4 control-label">Kewarganegaraan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kewarganegaraan_pemilik" required>
					</div>
				</div>
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
					<label class="col-md-4 control-label">Nomor Telepon/Fax :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_telepon_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Provinsi :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="provinsi_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kabupaten :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kabupaten_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kecamatan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kecamatan_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kelurahan/Desa :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kelurahan_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Status :</label>
					<div class="col-md-8">	
					<select class="form-control" id="bentukPerusahaan" name="status_perusahaan">
						<option value="PMA">PMA</option>
						<option value="PMD">PMD</option>
						<option value="Lainnya">Lainnya</option>
					</select>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kodepos :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kodepos_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor & Tanggal Akta :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_akta_pendirian" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor & Tanggal Pengesahan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_pengesahan_pendirian" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor & Tanggal Akta :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_akta_perubahan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor & Tanggal Pengesahan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_pengesahan_perubahan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Modal dan Nilai Kekayaan Bersih Perusahaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="modal_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Total NIlai Saham :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="total_saham" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nasional :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="persen_nasional" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Asing :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="persen_asing" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kelembagaan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kelembagaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kegiatan Usaha :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kegiatan_usaha" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Barang/Jasa Dagangan Utama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="dagangan_utama" required>
					</div>
				</div>
				<div class="form-group">
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