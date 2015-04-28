@extends('app')

@section('content')

<div class="main">
	<div class="main-inner">
		<div class="container">
			<form action="{{ action('PerizinanAirController@postUbahperizinan') }}" class="form-horizontal" method="POST">
				<div class="control-group">		
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="id" value=<?= $izinair->id ?> />
					<div class="controls">	
					<h2>Form Pengajuan Perubahan Izin</h2>
					</div><br><br>								
					<label class="control-label">Lokasi</label>
						<div class="controls">
							<select class="span6" id="select" name="lahan">
							  <option value="1"{{ ($izinair->id_lahan == 1) ? ' selected': '' }}>Jalan Dago Asri No 73 - Dago</option>
							  <option value="2"{{ ($izinair->id_lahan == 2) ? ' selected': '' }}>Jalan Cihampelas No 12 - Dago</option>
							  <option value="3"{{ ($izinair->id_lahan == 3) ? ' selected': '' }}>Jalan Buah Batu Asri No 33 - Buah Batu</option>
							</select>
						</div><br>
						<label class="control-label">Kategori Izin</label>
						<div class="controls">
							<select class="span6" id="select" name="kategori">
								<option value="1"{{ ($izinair->kategori == 1) ? ' selected': '' }}>Ijin Pengelolaan Air Bawah Tanah</option>
								<option value="2"{{ ($izinair->kategori == 2) ? ' selected': '' }}>Ijin Pengambilan Air Permukaan</option>
								<option value="3"{{ ($izinair->kategori == 3) ? ' selected': '' }}>Ijin Pembuangan Air Buangan ke Sumber Air</option>
								<option value="4"{{ ($izinair->kategori == 4) ? ' selected': '' }}>Ijin perubahan Alur, Bentuk, Dimensi, dan Kemiringan Dasar Saluran/Sungai</option>
								<option value="5"{{ ($izinair->kategori == 5) ? ' selected': '' }}>Ijin Pembangunan Lintasan yang Berada di Bawah/Atasnya</option>
								<option value="6"{{ ($izinair->kategori == 6) ? ' selected': '' }}>Ijin Pemanfaatan Bangunan Pengairan dan Lahan pada Daerah Sempadan Saluran Air</option>
								<option value="7"{{ ($izinair->kategori == 7) ? ' selected': '' }}>Ijin Pemanfaatan Lahan Mata Air dan Lahan Pengairan lainnya</option>
							</select>
						</div><br>
						
						<label class="control-label">Deskripsi</label>
						<div class="controls">
							<textarea class="span6" rows="3" id="textArea" name="deskripsi">{{ $izinair->deskripsi }}</textarea>
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
				<input type="hidden" name="id" value= />
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
				<textarea class="form-control" name="deskripsi" placeholder="deskripsi"></textarea><br>
				<button class="btn btn-primary" type="submit">Submit</button><br> 
			</form>
			</div>
		</div>
	</div>-->
@endsection