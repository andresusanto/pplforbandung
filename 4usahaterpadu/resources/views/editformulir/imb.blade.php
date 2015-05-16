@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Formulir Izin Mendirikan Bangunan (IMB)</h3></div>

	<div class="panel-body">
		<div class="col-md-2">	</div>
		<div class="col-md-8">
			{!! Form::open(['url'=>"editformulir/imb/".$formulir->id, 'method'=>'PATCH', 'class'=>'form-horizontal'])!!}
			<br>
			<h4>Pemohon</h4>
			<div class="row form-group">
				<label class="col-md-4 control-label">Nama :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="nama_pemohon" value="{{$formulir->nama_pemohon}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Pekerjaan/Jabatan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jabatan_pemohon" value="{{$formulir->jabatan_pemohon}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Alamat :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="alamat_pemohon" value="{{$formulir->alamat_pemohon}}" required>
				</div>
			</div>
			<h4>Tanah/Lahan</h4>
			<h5>Lokasi</h5>
			<div class="row form-group">
				<label class="col-md-4 control-label">Kampung :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="lokasi_kampung_lahan" value="{{$formulir->lokasi_kampung_lahan}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Desa/Kelurahan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="lokasi_kelurahan_lahan" value="{{$formulir->lokasi_kelurahan_lahan}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Kecamatan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="lokasi_kecamatan_lahan" value="{{$formulir->lokasi_kecamatan_lahan}}" required>
				</div>
			</div>
			<h5>Bukti Kepemilikan Tanah</h5>
			<div class="row form-group">
				<label class="col-md-4 control-label">Status :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="status_lahan" value="{{$formulir->status_lahan}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Nomor Surat Kepemilikan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="nomor_surat_kepemilikan" value="{{$formulir->nomor_surat_kepemilikan}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Luas Tanah :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="luas_tanah" value="{{$formulir->luas_tanah}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Nama Pemilik Tanah :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="nama_pemilik_lahan" value="{{$formulir->nama_pemilik_lahan}}" required>
				</div>
			</div>
			<h4>Bangunan</h4>
			<div class="row form-group">
				<label class="col-md-4 control-label">Jumlah Lantai Bangunan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_lantai_bangunan" value="{{$formulir->jumlah_lantai_bangunan}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Luas Lantai Dasar :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="luas_lantai_dasar" value="{{$formulir->luas_lantai_dasar}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Luas Lantai Atas :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="luas_lantai_atas" value="{{$formulir->luas_lantai_atas}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Luas Bangunan Pelengkap :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="luas_bangunan_pelengkap" value="{{$formulir->luas_bangunan_pelengkap}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Jumlah Luas Bangunan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_luas_bangunan" value="{{$formulir->jumlah_luas_bangunan}}" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label">Rencana Fungsi Bangunan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="rencana_fungsi_bangunan" value="{{$formulir->rencana_fungsi_bangunan}}" required>
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