@extends('app')

@section('content')

<div class="main">
	<div class="main-inner">
		<div class="container">
			<form action="{{ action('PerizinanAirController@postUbahperizinan') }}" class="form-horizontal" method="POST">
				<div class="control-group">		
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="id" value=<?= $id ?> />
					<div class="controls">	
					<h2>Form Pengajuan Perubahan Izin</h2>
					</div><br><br>								
					<label class="control-label">Nama Pemohon</label>
					<div class="controls">
						<input type="text" class="span6" id="nama_pemohon">
					</div><br>
					<label class="control-label">Lokasi</label>
					<div class="controls">
						<input type="text" class="span6" id="lokasi">
					</div><br>
					<label class="control-label">Kategori Izin</label>
					<div class="controls">
						<select name="selecter_basic" class="selecter_1 span6">
							<option value="1">Izin Pengelolaan Air Bawah Tanah</option>
							<option value="2">Izin Pengambilan Air Permukaan</option>
							<option value="3">Izin  pembuangan air buangan  ke sumber air</option>
							<option value="4">Izin perubahan alur, bentuk, dimensi, dan kemiringan dasar saluran/sungai </option>
							<option value="5">Izin pembangunan lintasan yang berada di bawah/atasnya </option>
							<option value="6">Izin pemanfaatan bangunan pengairan dan lahan pada daerah sempadan saluran air </option>
							<option value="7">Izin pemanfaatan lahan mata air dan lahan pengairan lainnya </option>
						</select>
					</div><br>
					<label class="control-label">Instansi</label>
					<div class="controls">
						<input type="text" class="span6" id="instansi">
					</div><br>
					<label class="control-label">Deskripsi</label>
					<div class="controls">
						<textarea class="span6" name="deskripsi" placeholder="deskripsi"><?= $deskripsi ?></textarea>
					</div><br>
					
					<div class="controls">
						<button type="submit" class="btn btn-primary">Ubah</button>
					</div><br>
				</div> 
			</form>
		</div>
	</div>
</div>
<!--
<div class="container documents">
		<div class="row">
			<div class="col-md-5">
			<form action="{{ action('PerizinanAirController@postUbahperizinan') }}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="id" value=<?= $id ?> />
				<label>Nama Pemohon</label>
				<input class="form-control" placeholder="nama pemohon"><br>
				<label>Lokasi</label>
				<input class="form-control" placeholder="lokasi"><br>
				<label>Jenis Izin </label>
				<select name="selecter_basic" class="selecter_1 form-control">
					<option value="1">Izin Pengelolaan Air Baw contrlah Tanah</option>
					<option value="2">Izin Pengambilan Air Permukaan</option>
					<option value="3">Izin  pembuangan air buangan  ke sumber air</option>
					<option value="4">Izin perubahan alur, bentuk, dimensi, dan kemiringan dasar saluran/sungai </option>
					<option value="5">Izin pembangunan lintasan yang berada di bawah/atasnya </option>
					<option value="6">Izin pemanfaatan bangunan pengairan dan lahan pada daerah sempadan saluran air </option>
					<option value="7">Izin pemanfaatan lahan mata air dan lahan pengairan lainnya </option>
				</select><br><br>
				<label>Instansi</label>
				<input class="form-control" placeholder="instansi"><br>
				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi" placeholder="deskripsi"><?= $deskripsi ?></textarea><br>
				<button class="btn btn-primary" type="submit">Submit</button><br> 
			</form>
			</div>
		</div>
	</div>-->
@endsection