<!DOCTYPE html>
<html>
<head>
    <title><?php echo $namasurat;?></title>
</head>
<body>
	<div align="center">
		<table>
			<tr>
				<td>
					<img src="img/logo.png" style="width:90px">
				</td>
				<td align="center" style="PADDING-LEFT: 15px">
					<font size="14"><b>PEMERINTAH KOTA BANDUNG</b></font><br>
			    	<font size="14"><b>DINAS KOPERASI UKM DAN PERINDUSTRIAN PERDAGANGAN</b></font><br>
			    	<font size="12">Jl. Kawaluyaan No. 2 Telp/Fax (022) 7308358, BANDUNG</font><br>
				</td>
			</tr>
		</table>
    	
    	<hr style="border: 3px outset #595955;">
    	<br>
    	<font size="13"><u><b><?php echo strtoupper($namasurat); ?></b></u></font><br>
    	<font size="12"><b>NOMOR: <?php echo $nomorsurat; ?></b></font><br><br><br>    	
    </div>
    <div><?php $no = 1;?>
    	<font size="12">Memperhatikan <?php echo $peraturan;?>, maka <?php echo $namasurat;?> ini diberikan kepada:</font>
    	<br>
    	<table>
		  	<tr>
			    <td style="width:3px"  style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="width:220px" style="vertical-align: top"><font size="12">Nama Perusahaan</font></td>
			    <td style="width:3px" style="vertical-align: top">:</td>		
			    <td><?php echo $namaperusahaan; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="vertical-align: top"><font size="12">Alamat Kantor Perusahaan</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $alamatperusahaan; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="vertical-align: top"><font size="12">Nama Pemilik/Penanggung Jawab</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $namapemilik; ?></td>
		  	</tr>
		  	<tr>
			    <td style="width:3px"  style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="width:220px" style="vertical-align: top"><font size="12">Nama Usaha</font></td>
			    <td style="width:3px" style="vertical-align: top">:</td>		
			    <td><?php echo $namausaha; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="vertical-align: top"><font size="12">Lokasi Usaha</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $lokasiusaha; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="vertical-align: top"><font size="12">Kegiatan Usaha</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $kegiatanusaha; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12"><?php echo $no; $no++;?>.</font></td>
			    <td style="vertical-align: top"><font size="12">Bidang Usaha</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $bidangusaha; ?></td>
		  	</tr>
		</table>
		<br>
		<font size="12"><b><?php echo $namasurat;?> ini diterbitkan dengan ketentuan :</b></font>
		<table>
		  	<tr>
			    <td style="vertical-align: top">PERTAMA</td>
			    <td style="vertical-align: top">:</td>		
			    <td>
			    	<table>
			    		<tr>
			    			<td style="vertical-align: top">a.</td>
			    			<td>Izin ini berlaku untuk melakukan kegiatan usaha 
			    				perdagangan di seluruh Wilayah Republik Indonesia selama perusahaan masih menjalankan
			    				kegiatan Usaha Perdagangan</td>
			    		</tr>
			    		<tr>
			    			<td>b.</td>
			    			<td>Registrasi/Heregistrasi berlaku <?php echo $daftarulang;?> tahun</td>
			    		</tr>
			    	</table>
			    </td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top">KEDUA</td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $ketentuan2;?></td>
		  	</tr>
		  	<tr>
			    <td>KETIGA</td>
			    <td>:</td>		
			    <td>Tidak untuk melakukan kegiatan usaha selain yang tercantum dalam izin ini.</td>
		  	</tr>
		</table>
		<br><br>
		<table style="vertical-align: text-bottom" width="100%">
		  	<tr>
			    <td style="vertical-align: bottom" width="60%">
		    		<font size="10pt">Tembusan disampaikan kepada Yth. :</font><br>
		    		<table>
		    			<tr>
		    				<td style="vertical-align: top"><font size="10pt">1.</font></td>
		    				<td><font size="10pt">Sekretaris Daerah</font><br>
		    					<font size="10pt">cq. Asisten Ekonomi</font><br>
		    					<font size="10pt">Pembangunan dan Kesra</font>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td><font size="10pt">2.</font></td>
		    				<td><font size="10pt">Inspektorat Wilayah Kota</font></td>
		    			</tr>
		    		</table>
		    	</td>	
			    <td width="40%">
			    	<table>
			    		<tr>
			    			<td><font size="12">Dikeluarkan di</font></td>
			    			<td><font size="12">:</font></td>
			    			<td><font size="12">Bandung,</font></td>
			    		</tr>
			    		<tr>
			    			<td><font size="12">Pada tanggal</font></td>
			    			<td><font size="12">:</font></td>
			    			<td><font size="12"><?php echo $tanggal; ?></font></td>
			    		</tr>
			    		<tr>
			    			<td><font size="12">Berlaku s/d</font></td>
			    			<td><font size="12">:</font></td>
			    			<td><font size="12"><?php echo $berlakusampai; ?></font></td>
			    		</tr>
			    	<table>
		    		<div align="center">
		    			<font size="12">DINAS KOPERASI UKM DAN <br>PERINDUSTRIAN PERDAGANGAN</font><br>
		    			<font size="12">KOTA BANDUNG</font><br>	    			
		    			<font size="12">Kepala,</font><br><br><br><br><br>    			
		    			<font size="12"><u><?php echo $namakepala; ?></u></font><br>
		    			<font size="12"><?php echo $jabatankepala; ?></font><br>
		    			<font size="12">NIP. <?php echo $nipkepala; ?></font><br>
		    		</div>
			    </td>
		  	</tr>
		</table>
    </div>
</body>
</html>