<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrasi UKM</title>
	<link rel="stylesheet"  href="{{ asset('/css/view.css') }}" >


</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registrasi UKM</a></h1>
		<form id="form_994454" class="appnitro" enctype="multipart/form-data" method="post" action="">
		<div class="form_description">
			<h2>Registrasi UKM</h2>
			<p>Mohon isikan setiap field demi kelancaran registrasi usaha</p>
		</div>						
			<ul >
			
					<li id="li_4" >
		<label class="description" for="element_4">NIK Kartu Tanda Penduduk (KTP) Pelaku Usaha</label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Nomor Pokok Wajib Pajak </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Nama Perusahaan </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Alamat Perusahaan </label>
		
		<div>
			<input id="element_1_1" name="element_1_1" class="element text large" value="" type="text">
			<label for="element_1_1">Alamat Lengkap Perusahaan</label>
		</div>
	
		<div class="left">
			<input id="element_1_5" name="element_1_5" class="element text medium" maxlength="15" value="" type="text">
			<label for="element_1_5">Kode Pos</label>
		</div>
	
		
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Email Perusahaan </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12">Kategori Usaha </label>
		<div>
		<select class="element select medium" id="element_12" name="element_12"> 
			<option value="" selected="selected"></option>
			<option value="1" >Agro</option>
			<option value="2" >Kimia</option>
			<option value="3" >Non-Formal</option>

		</select>
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Surat Permohonan Izin Usaha </label>
		<div>
			<input id="element_6" name="element_6" class="element file" type="file"/> 
		</div>  
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Surat Kepemilikan Tempat </label>
		<div>
			<input id="element_7" name="element_7" class="element file" type="file"/> 
		</div>  
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Surat Keterangan Lokasi </label>
		<div>
			<input id="element_8" name="element_8" class="element file" type="file"/> 
		</div>  
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Bukti Lunas PBB </label>
		<div>
			<input id="element_9" name="element_9" class="element file" type="file"/> 
		</div>  
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Surat Ijin Gangguan </label>
		<div>
			<input id="element_10" name="element_10" class="element file" type="file"/> 
		</div>  
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Surat Sumpah </label>
		<div>
			<input id="element_11" name="element_11" class="element file" type="file"/> 
		</div>  
		</li>	<li id="li_12" >
		<label class="description" for="element_12">Unggah Gambar/Logo Perusahaan</label>
		<div>
			<input id="element_6" name="element_12" class="element file" type="file"/> 
		</div>  
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="994454" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
	<script type="text/javascript" src="view.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>