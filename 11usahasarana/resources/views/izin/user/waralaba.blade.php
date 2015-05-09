<?php $jenis = 'TandaPendaftaranWaralaba';?>
<?php $stats = 'user';?>

@extends ('home.headeruser')

@section ('content')
<script>
	$(document).ready(function(){
		$("#DataPribadi").toggle(true);
		$("#DataIzinUsahaTerpadu").toggle(false);
		$("#DataLain").toggle(false);
		
		$("#DataPribadiButton").click(function(){
			$("#DataPribadi").toggle();
			if (!$("#DataIzinUsahaTerpadu").is(":hidden")) {
				$("#DataIzinUsahaTerpadu").toggle();
			}
			if (!$("#DataLain").is(":hidden")) {
				$("#DataLain").toggle();
			}
		});
		
		$("#DataIzinUsahaTerpaduButton").click(function(){
			$("#DataIzinUsahaTerpadu").toggle();
			if (!$("#DataPribadi").is(":hidden")) {
				$("#DataPribadi").toggle();
			}
			if (!$("#DataLain").is(":hidden")) {
				$("#DataLain").toggle();
			}
		});
		
		
		$("#DataLainButton").click(function(){
			$("#DataLain").toggle();
			if (!$("#DataPribadi").is(":hidden")) {
				$("#DataPribadi").toggle();
			}
			if (!$("#DataIzinUsahaTerpadu").is(":hidden")) {
				$("#DataIzinUsahaTerpadu").toggle();
			}
		});
    });
</script>
	<center><p style="font-size: 20px;" class="label label-info label-title">Form Izin Tanda Pendaftaran Waralaba</p></center>
	<br><br>
	<form role ="form" method ="post" enctype="multipart/form-data" action="{{ url('izin/IzinTandaPendaftaranWaralaba/store') }}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class ="form-group">
			<button class="btn btn-default dropdown-toggle" id ="DataPribadiButton" type="button" data-toggle="dropdown">  <b>Data Pribadi</b> <span class="caret"></span></button>
			<button class="btn btn-default dropdown-toggle" id ="DataIzinUsahaTerpaduButton" type="button" data-toggle="dropdown">  <b>Data Izin Usaha Terpadu</b> <span class="caret"></span></button>
			<button class="btn btn-default dropdown-toggle" id ="DataLainButton" type="button" data-toggle="dropdown">  <b>Data Lainnya</b> <span class="caret"></span></button>
		</div>
		
		<div class ="form-group" id ="DataPribadi">
			@include('izin.user.formidentitas')
			<label for="KTP">Fotokopi KTP Pimpinan</label>
			<input type="file" id="KTPFile" name="KTPFile" required>
		</div>
		
		<div id ="DataIzinUsahaTerpadu" class ="form-group">
			<label for="TandaDaftarPerusahaan">Fotokopi Tanda Daftar Perusahaan</label>
			<input type="file" id="TandaDaftarPerusahaanFile" name ="TandaDaftarPerusahaanFile" required>
			
			<label for="AktaPendirian">Akta Pendirian Perusahaan</label>
			<input type="text" id="AktaPendirianFile" name ="AktaPendirianFile" required placeholder="nomor akta pendirian perusahaan">
		</div>
		
		<div id ="DataLain" class ="form-group">
			<label for ="IzinTeknis">Fotokopi Izin Teknis</label>
			<input type="file" id="IzinTeknisFile" name ="IzinTeknisFile" required>
			<label for ="ProspektusPenawaranWaralaba">Fotokopi Prospektus Penawaran Waralaba</label>
			<input type="file" id="ProspektusPenawaranWaralabaFile" name ="ProspektusPenawaranWaralabaFile" required>
		
			<label for ="PerjanjianWaralaba">Fotokopi Perjanjian Waralaba</label>
			<input type="file" id="PerjanjianWaralabaFile" name ="PerjanjianWaralabaFile" required>
			<label for ="HAKI">Fotokopi Tanda Bukti Pendaftaran Hak Kekayaan Intelektual</label>
			<input type="file" id="HAKIFile" name ="HAKIFile" required>
		
			<label for ="STPW">Fotokopi Surat Tanda Pendaftaran Waralaba Pemberi Waralaba</label>
			<input type="file" id="STPWFile" name ="STPWFile" required>
		</div>
		<button type="submit" class="btn btn-default">Daftar</button>
	</form>
@endsection