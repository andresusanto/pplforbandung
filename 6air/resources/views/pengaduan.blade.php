@extends('app')

@section('content')
<div class="container documents">
		<div class="row">
			<div class="col-md-5 ">
			<!-- form perizinan -->
					<form class="form-horizontal" action="{{ action('PengaduanController@postIndex') }}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="control-group">	
					  <fieldset>
						<div class="controls">	
							<h2>Form Pengaduan</h2>
						</div><br><br>	
						<label class="control-label">Nama Pelapor</label>
						<div class="controls">
							<input type="text" class="span6" id="nama" name="nama" />
						</div><br>
						<label class="control-label">Kontak</label>
						<div class="controls">
							<input type="text" class="span6" id="kontak" name="kontak" />
						</div><br>
						<label class="control-label">Judul</label>
						<div class="controls">
							<input type="text" class="span6" id="judul" name="judul" />
						</div><br>
						
						<label class="control-label">Deskripsi Pengaduan</label>
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