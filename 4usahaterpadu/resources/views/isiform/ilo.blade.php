@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Formulir Izin Lokasi (ILO)</h3></div>
	<div class="panel-body">
		<div class="col-md-2">	</div>
		<div class="col-md-8">
			{!! Form::open(['url'=>"upload/ilo", 'method'=>'PATCH', 'class'=>'form-horizontal'])!!}
				<br>
				<h4>Pemohon</h4>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemohon" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Jabatan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="jabatan_pemohon" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Alamat :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="alamat_pemohon" required>
					</div>
				</div>
				<h4>Perusahaan</h4>
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
					<label class="col-md-4 control-label">Akta Pendirian :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="akta_pendirian" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">NPWP :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="npwp" required>
					</div>
				</div>
				<h4>Lokasi</h4>
				<div class="row form-group">
					<label class="col-md-4 control-label">Luas :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="luas_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Blok :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="letak_blok_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Desa/Kelurahan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="letak_kelurahan_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kecamatan :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="letak_kecamatan_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Kondisi Saat Ini :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="kondisi_perusahaan" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nomor Persil :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nomor_persil" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 control-label">Nama Pemilik :</label>
					<div class="col-md-8">
						<input  type="text" class="form-control" name="nama_pemilik" required>
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