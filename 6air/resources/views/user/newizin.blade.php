@extends('app')

@section('content')
<div class="container documents">
		<div class="row">
			<div class="col-md-5 ">
			<!-- form perizinan -->
					<form class="form-horizontal" action="{{ action('PerizinanAirController@postNewperizinan') }}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="control-group">	
					  <fieldset>
						<div class="controls">	
							<h2>Form Perizinan Baru</h2>
						</div><br><br>	
						<label class="control-label">Lokasi</label>
						<div class="controls">
							<select class="span6" id="select" name="lahan">
							  <option value="1">Jalan Dago Asri No 73 - Dago</option>
							  <option value="2">Jalan Cihampelas No 12 - Dago</option>
							  <option value="3">Jalan Buah Batu Asri No 33 - Buah Batu</option>
							</select>
						</div><br>
						<label class="control-label">Kategori Izin</label>
						<div class="controls">
							<select class="span6" id="select" name="kategori">
								<option value="1">Ijin Pengelolaan Air Bawah Tanah</option>
								<option value="2">Ijin Pengambilan Air Permukaan</option>
								<option value="3">Ijin Pembuangan Air Buangan ke Sumber Air</option>
								<option value="4">Ijin perubahan Alur, Bentuk, Dimensi, dan Kemiringan Dasar Saluran/Sungai</option>
								<option value="5">Ijin Pembangunan Lintasan yang Berada di Bawah/Atasnya</option>
								<option value="6">Ijin Pemanfaatan Bangunan Pengairan dan Lahan pada Daerah Sempadan Saluran Air</option>
								<option value="7">Ijin Pemanfaatan Lahan Mata Air dan Lahan Pengairan lainnya</option>
							</select>
						</div><br>
						
						<label class="control-label">Deskripsi</label>
						<div class="controls">
							<textarea class="span6" rows="3" id="textArea" name="deskripsi"></textarea>
						</div><br>
						<div class="controls">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div><br>
						
					  </fieldset>
					  </div>
					</form>
					<!-- end form perizinan -->
					
			</div>
		</div>
	</div>
@endsection