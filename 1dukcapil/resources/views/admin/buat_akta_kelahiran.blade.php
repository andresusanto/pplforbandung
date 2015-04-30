@extends('app-admin')

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 mb">
		<form action="{{ url('/aktakelahiran/buat') }}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="content-panel">
				<div id="profile-gradient">
					<h3>Data Kelahiran</h3>
					<h6>Formulir Pembuatan</h6>
				</div>
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Data Bayi</h4>
			        <div class="form-horizontal tasi-form" method="get">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nama Lengkap</label>
			                <div class="col-sm-6">
			                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
			                </div>
			                <label class="col-sm-2 control-label">Jenis Kelamin</label>
			                <div class="col-sm-2">
		                        <select class="form-control" name="jenisKelamin">
		                            <option value="L">Laki-laki</option>
		                            <option value="P">Perempuan</option>
		                        </select>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Tempat Lahir</label>
			                <div class="col-sm-4">
			                    <input class="form-control" placeholder="Tempat Kelahiran" name="tempatLahir">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Tanggal Lahir</label>
			                <div class="col-sm-4">
			                    <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir" name="tanggalLahir">
			                </div>
			                <label class="col-sm-2 control-label">Jam Lahir</label>
			                <div class="col-sm-4">
			                    <input type="time" value="00:00"  class="form-control" placeholder="Jam Lahir" name="jamLahir">
			                </div>
			            </div>
			        </div>
		    	</div>
		    	<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Data Orang Tua</h4>
			        <div class="form-horizontal tasi-form" method="get">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nomor Akta Nikah</label>
			                <div class="col-sm-2">
			                    <input class="form-control" placeholder="Nomor Akta Nikah">
			                </div>
			            </div>
			        </div>
		    	</div>
				<button type="submit" class="btn btn-theme03">Lanjut</button>
			</div><!--/content-panel -->
		</form>
	</div><!--/col-md-4 -->
</div>
@endsection