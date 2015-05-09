@extends('app-admin')

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 mb">
		<form action="{{ url('/aktanikah/buataktanikah') }}" method="POST">
		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			<div class="content-panel">
				<div id="profile-gradient">
					<h3>Akta Pernikahan</h3>
					<h6>Formulir Pembuatan</h6>
				</div>
				<div class="form-panel">
			        <div class="form-horizontal tasi-form">
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Tanggal Pernikahan</label>
			                <div class="col-sm-4">
			                    <input type="date" class="form-control" name="tanggal">
			                </div>
			                <label class="col-sm-2 control-label">Tempat Pernikahan</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="tempat">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Laki-Laki</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="nik-pria" value="2132546615297075">
			                </div>
			                <label class="col-sm-2 control-label">Nomor Induk Kependudukan Perempuan</label>
			                <div class="col-sm-4">
			                    <input type="text" class="form-control" name="nik-wanita" value="5075110202027282">
			                </div>
			            </div>
			        </div>
			        <button type="button" class="btn btn-theme03" id="detail">Validasi Nomor Induk Kependudukan</button>
					<button id="submit_button" type="submit" class="btn btn-theme03" disabled>Lanjut</button>
		    	</div>
			</div><!--/content-panel -->
		</form>
	</div><!--/col-md-4 -->
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="content-panel">
			<div id="profile-01">
				<h3>Detil Mempelai Pria</h3>
			</div>
			<div class="form-panel">
		        <div class="form-horizontal tasi-form" method="GET">
		            <div class="form-group">
		                <label class="col-sm-2 control-label">Nama Lengkap</label>
		                <div class="col-sm-10">
		                    <input type="text" class="form-control" name="nama_lengkap_pria" disabled>
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-sm-2 control-label">Tempat Lahir</label>
		                <div class="col-sm-4">
		                    <input type="text" class="form-control" name="tempat_lahir_pria" disabled>
		                </div>
		                <label class="col-sm-2 control-label">Tanggal Lahir</label>
		                <div class="col-sm-4">
		                    <input type="text" class="form-control" name="tanggal_lahir_pria" disabled>
		                </div>
		            </div>
		        </div>
	    	</div>
		</div><!--/content-panel -->
	</div>
	<div class="col-sm-6">
		<div class="content-panel">
			<div id="profile-01">
				<h3>Detil Mempelai Perempuan</h3>
			</div>
			<div class="form-panel">
		        <div class="form-horizontal tasi-form" method="GET">
		            <div class="form-group">
		                <label class="col-sm-2 control-label">Nama Lengkap</label>
		                <div class="col-sm-10">
		                    <input type="text" class="form-control" name="nama_lengkap_wanita" disabled>
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-sm-2 control-label">Tempat Lahir</label>
		                <div class="col-sm-4">
		                    <input type="text" name="tempat_lahir_wanita" class="form-control" disabled>
		                </div>
		                <label class="col-sm-2 control-label">Tanggal Lahir</label>
		                <div class="col-sm-4">
		                    <input type="text" name="tanggal_lahir_wanita" class="form-control" disabled>
		                </div>
		            </div>
		        </div>
	    	</div>
		</div><!--/content-panel -->
	</div>
</div>
@endsection

@section('script')
    <script>
    $("document").ready(function(){
	    $('#detail').click(function(e){
	        e.preventDefault();
	        var nikpria=$('[name="nik-pria"]').val();
	        var nikwanita=$('[name="nik-wanita"]').val();
	        var tanggal_pernikahan=$('[name="tanggal"]').val();
	        var tempat_pernikahan=$('[name="tempat"]').val();
	        if(nikpria.length>0 && nikwanita.length>0) {
	            $.ajax({
	                type: "GET",
	                url: 'http://dukcapil.pplbandung.biz.tm/aktanikah/searchnik',
	                data: {nik_pria: nikpria, nik_wanita: nikwanita},
	                success: function (response) {
	                    var error='';
	                    if(response['pria']===null){
	                        error+='NIK pria tidak ditemukan\n';
	                        $('[name="nama_lengkap_pria"]').val('');
	                        $('[name="tempat_lahir_pria"]').val('');
	                        $('[name="tanggal_lahir_pria"]').val('');
	                    }
	                    else{
	                        $('[name="nama_lengkap_pria"]').val(response['pria'].nama);
	                        $('[name="tempat_lahir_pria"]').val(response['pria'].tempatLahir);
	                        $('[name="tanggal_lahir_pria"]').val(response['pria'].waktuLahir);
	                    }
	                    if(response['wanita']===null){
	                        error+='NIK wanita tidak ditemukan';
	                        $('[name="nama_lengkap_wanita"]').val('');
	                        $('[name="tempat_lahir_wanita"]').val('');
	                        $('[name="tanggal_lahir_wanita"]').val('');
	                    }
	                    else{
	                        $('[name="nama_lengkap_wanita"]').val(response['wanita'].nama);
	                        $('[name="tempat_lahir_wanita"]').val(response['wanita'].tempatLahir);
	                        $('[name="tanggal_lahir_wanita"]').val(response['wanita'].waktuLahir);
	                    }
	                    if(error.length>0){
	                        alert(error);
	                    }
	                    else  $('#submit_button').attr('disabled',false);
	                },
	                error: function () {
	                    alert("Internal Server Error");
	                }
	            }, "html");
	        }else{
	            alert('NIK ada yang kosong');
	        }

	    });
	});
    </script>
@endsection
