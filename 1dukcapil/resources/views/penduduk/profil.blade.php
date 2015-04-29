@extends('app-penduduk')

@section('content')
<div class="row">
	<div class="span12">
		<div class="widget ">
			<div class="widget-header">
				<i class="icon-user"></i>
				<h3>Profil</h3>
			</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="form-horizontal">
					<fieldset>
						<div class="control-group">											
							<label class="control-label" for="username">Nama Lengkap</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->nama }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Jenis Kelamin</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->jenisKelamin }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Golongan Darah</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->golonganDarah }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Agama</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->agama }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Kewarnegaraan</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->kewarnegaraan }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Pendidikan</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->pendidikan }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Tempat Lahir</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->tempatLahir }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Waktu Lahir</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->waktuLahir }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
						<div class="control-group">											
							<label class="control-label" for="username">Pekerjaan</label>
							<div class="controls">
								<p class="span6">{{ $penduduk->pekerjaan }}</p>
							</div> <!-- /controls -->				
						</div> <!-- /control-group -->
					</fieldset>
				</div>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->
</div>
@endsection