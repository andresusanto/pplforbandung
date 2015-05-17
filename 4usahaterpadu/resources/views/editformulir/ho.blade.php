@extends("layouts.masterfront")
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading inline text-center" ><h3>Formulir Pengajuan Izin Gangguan (HO)</h3></div>

	<div class="panel-body">
		<div class="col-md-2">	</div>
		{!! Form::open(['url'=>"editformulir/ho/".$formulir->id, 'method'=>'PATCH', 'class'=>'form-horizontal'])!!}

		<div class="col-md-8">

			<br>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="namaPengusaha">Nama Pengusaha :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="nama_pengusaha" value="{{$formulir->nama_pengusaha}}" id="namaPengusaha" required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="alamatPengusaha">Alamat Pengusaha :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="alamat_pemilik" value="{{$formulir->alamat_pemilik}}" id="alamatPengusaha"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="kebangsaan">Kebangsaan :</label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="kebangsaan" value="{{$formulir->kebangsaan}}" id="kebangsaan"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="namaPerusahaan">Nama Perusahaan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="nama_perusahaan" value="{{$formulir->nama_perusahaan}}" id="namaPerusahaan"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="letakPerusahaan">Letak Perusahaan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="letak_perusahaan" value="{{$formulir->letak_perusahaan}}" id="letakPerusahaan"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="bentukPerusahaan">Bentuk Perusahaan : </label>
				<div class="col-md-2">	</div>
				<div class="col-md-8">
					<select class="col-md-10 form-control" id="bentukPerusahaan" name="bentuk_perusahaan" value="{{$formulir->bentuk_perusahaan}}">
						<option value="Perorangan">Perorangan</option>
						<option value="CV">CV</option>
						<option value="PT">PT</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="statusPerusahaan">Status Perusahaan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="status_perusahaan" value="{{$formulir->status_perusahaan}}" id="statusPerusahaan"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="jenisUsaha">Jenis Usaha : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jenis_usaha" value="{{$formulir->jenis_usaha}}" id="jenisUsaha"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="permohonan">Permohonan : </label>
				<div class="col-md-2">	</div>
				<div class="col-md-8">
					<select class="col-md-6 form-control" id="permohonan" name="permohonan" value="{{$formulir->permohonan}}">
						<option value="Baru">Baru</option>
						<option value="Perluasan">Perluasan</option>
						<option value="Perubahan izin">Perubahan izin</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="luasTanah">Luas Tanah : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="luas_tanah" value="{{$formulir->luas_tanah}}" id="luasTanah"  required>
				</div>
			</div>
			<h4>Batas-batas :</h4>

			<div class="form-group">
				<label class="col-md-4 control-label" for="batasUtara">Utara : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="batas_utara" value="{{$formulir->batas_utara}}" id="batasUtara"  required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="batasTimur">Timur : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="batas_timur" value="{{$formulir->batas_timur}}" id="batasTimur"  required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="batasSelatan">Selatan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="batas_selatan" value="{{$formulir->batas_selatan}}" id="batasSelatan"  required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="batasBarat">Barat : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="batas_barat" value="{{$formulir->batas_barat}}" id="batasBarat"  required>
				</div>
			</div>

			<div class="row form-group">
				<label class="col-md-4 control-label" for="luasBangunan">Luas Bangunan Perusahaan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="luas_bangunan" value="{{$formulir->luas_bangunan}}" id="luasBangunan"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="keadaanBangunan">Keadaan Bangunan : </label>
				<div class="col-md-2">	</div>
				<div class="col-md-8">
					<select class="col-md-6 form-control" id="keadaanBangunan" name="keadaan_bangunan" value="{{$formulir->keadaan_bangunan}}">
						<option value="1">Permanen</option>
						<option value="2">Semi Permanen</option>
						<option value="3">Darurat</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="statusTanah">Status Tanah Perusahaan: </label>
				<div class="col-md-2">	</div>
				<div class="col-md-8">
					<select class="col-md-5 form-control" id="statusTanah" name="status_tanah" value="{{$formulir->status_tanah}}">
						<option  value="1">Milik Oranglain</option>
						<option  value="2">Milik Sendiri</option>
					</select>
				</div>
			</div>

			<h4>Tenaga Kerja : </h4>
			<h5>Pribumi : </h5>

			<div class="row form-group">
				<label class="col-md-4 control-label" for="pribumiPria">Laki-laki : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_tenaga_kerja_pribumi_lk" value="{{$formulir->jumlah_tenaga_kerja_pribumi_lk}}" id="pribumiPria"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="pribumiWanita">Wanita : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_tenaga_kerja_pribumi_pr" value="{{$formulir->jumlah_tenaga_kerja_pribumi_pr}}" id="pribumiWanita"  required>
				</div>
			</div>

			<h5>Asing : </h5>

			<div class="row form-group">
				<label class="col-md-4 control-label" for="asingPria">Laki-laki : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_tenaga_kerja_asing_lk" value="{{$formulir->jumlah_tenaga_kerja_asing_lk}}" id="asingPria"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="asingWanita">Wanita : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_tenaga_kerja_asing_pr" value="{{$formulir->jumlah_tenaga_kerja_asing_pr}}" id="asingWanita"  required>
				</div>
			</div>

			<div class="row form-group">
				<label class="col-md-4 control-label" for="banyakPeralatan">Banyaknya Peralatan Mesin dan Tenaga Penggerak yang Dipergunakan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="banyak_peralatan" value="{{$formulir->banyak_peralatan}}" id="banyakPeralatan"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="sumberAir">Sumber Air yang Dipergunakan : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="sumber_air" value="{{$formulir->sumber_air}}" id="sumberAir"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="jumlahJamKerja">Jumlah Jam Kerja : </label>
				<div class="col-md-8">
					<input  type="text" class="form-control" name="jumlah_jam_kerja" value="{{$formulir->jumlah_jam_kerja}}" id="jumlahJamKerja"  required>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-4 control-label" for="lainLain">Lain-lain :</label>
				<div class="col-md-8">
					<textarea class="form-control" rows="5" name="lain_lain" id="lainLain">
						{{$formulir->lain_lain}}
					</textarea>
				</div>
			</div>

			<div class="form-group">
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
