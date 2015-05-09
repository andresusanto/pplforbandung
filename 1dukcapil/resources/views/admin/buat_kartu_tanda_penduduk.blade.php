@extends('app-admin')

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 mb">
		<form method="post" action="{{url('kartutandapenduduk/buat')}}">
			<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<div class="content-panel">
				<div id="profile-gradient">
					<h3>Kartu Tanda Penduduk</h3>
					<h6>Formulir Pembuatan</h6>
				</div>
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Detil</h4>
			        <div class="form-horizontal tasi-form" method="get">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nomor Akta Kelahiran</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="nomorAktaLahir">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nama Lengkap</label>
			                <div class="col-sm-10">
			                    <input type="text" class="form-control" name="nama">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Jenis Kelamin</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="jenisKelamin">
			                </div>
			                <label class="col-sm-2 control-label">Golongan Darah</label>
			                <div class="col-sm-4">
                                <select class="form-control" name="golonganDarah">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Tempat Lahir</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="tempatLahir">
			                </div>
			                <label class="col-sm-2 control-label">Tanggal Lahir</label>
			                <div class="col-sm-4">
			                    <input type="date" class="form-control" name="tanggalLahir">
			                </div>
			            </div>
			        </div>
		    	</div>
		    	<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Status</h4>
			        <div class="form-horizontal tasi-form" method="get">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Pekerjaan</label>
			                <div class="col-sm-2">
			                    <input type="text" class="form-control" name="pekerjaan">
			                </div>
			                <label class="col-sm-2 control-label">Status Perkawinan</label>
			                <div class="col-sm-2">
			                	<select class="form-control" name="statusPernikahan">
                                    <option value="">Belum Kawin</option>
                                    <option value="">Kawin</option>
                                    <option value="">Cerai</option>
                                </select>
			                </div>
			                <label class="col-sm-2 control-label">Kewarnegaraan</label>
			                <div class="col-sm-2">
			                    <input type="text" class="form-control" name="kewarnegaraan">
			                </div>
			            </div>
			        </div>
		    	</div>
		    	<button type="button" class="btn btn-theme03">Validasi Nomor Akta Kelahiran</button>
				<button type="submit" class="btn btn-theme03">Lanjut</button>
			</div><!--/content-panel -->
		</form>
	</div><!--/col-md-4 -->
</div>
@endsection