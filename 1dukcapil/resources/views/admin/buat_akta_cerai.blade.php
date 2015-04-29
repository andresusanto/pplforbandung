@extends('app-admin')

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 mb">
		<form method="post" action="{{url('aktacerai/buataktacerai')}}" id="kkForm">
			<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<div class="content-panel">
				<div id="profile-gradient">
					<h3>Akta Penceraian</h3>
					<h6>Formulir Pembuatan</h6>
				</div>
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Detil</h4>
			        <div class="form-horizontal tasi-form" method="get">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nomor Akta Nikah</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="no-akta-nikah">
			                </div>
			                <label class="col-sm-2 control-label">Tanggal Penceraian</label>
			                <div class="col-sm-4">
			                    <input type="date" class="form-control" name="tanggal-cerai">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Laki-Laki</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="nik-pria">
			                </div>
			                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Perempuan</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="nik-wanita">
			                </div>
			            </div>
			        </div>
		    	</div>
		    	<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Status Mantan Istri</h4>
			        <div class="form-horizontal tasi-form" method="get">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Keadaan Istri Bekas</label>
			                <div class="col-sm-2">
			                    <input name="keadaan-istri" type="text" class="form-control">
			                </div>
			                <label class="col-sm-2 control-label">Status Penceraian</label>
			                <div class="col-sm-2">
			                    <input type="text" class="form-control">
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