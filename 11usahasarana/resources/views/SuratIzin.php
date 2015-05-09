<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
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
    	<font size="13"><u><b><?php echo $namasurat; ?></b></u></font><br>
    	<font size="12"><b>NOMOR: <?php echo $nomorsurat; ?></b></font><br><br><br>    	
    </div>
    <div>
    	<font size="12">Surat izin ini diberikan kepada:</font>
    	<table>
		  	<tr>
			    <td style="width:3px"  style="vertical-align: top"><font size="12">1.</font></td>
			    <td style="width:300px" style="vertical-align: top"><font size="12">Nama Perusahaan</font></td>
			    <td style="width:3px" style="vertical-align: top">:</td>		
			    <td><?php echo $namaperusahaan; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">2.</font></td>
			    <td style="vertical-align: top"><font size="12">Merek (milik sendiri/lisensi)</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $merek; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">3.</font></td>
			    <td style="vertical-align: top"><font size="12">Alamat Kantor Perusahaan</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $alamatperusahaan?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">4.</font></td>
			    <td style="vertical-align: top"><font size="12">Nama Pemilik/Penanggung Jawab</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $namapemilik; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">5.</font></td>
			    <td style="vertical-align: top"><font size="12">Alamat Pemilik/Penanggung Jawab</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $alamatpemilik; ?></td>
		  	</tr>
		  	<tr>
			    <td><font size="12">6.</font></td>
			    <td><font size="12">Nomor Pokok Wajib Pajak</font></td>
			    <td>:</td>		
			    <td><?php echo $npwp; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">7.</font></td>
			    <td><font size="12">Nilai Modal dan Kekayaan Bersih Perusahaan 
			    	seluruhnya tidak termasuk Tanah dan Bangunan Tempat Berusaha</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td style="vertical-align: top"><?php echo $nilaimodal; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">8.</font></td>
			    <td style="vertical-align: top"><font size="12">Kegiatan Usaha</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $kegiatanusaha; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">9.</font></td>
			    <td style="vertical-align: top"><font size="12">Kelembagaan</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $kelembagaan; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">10.</font></td>
			    <td style="vertical-align: top"><font size="12">Bidang Usaha</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $bidangusaha; ?></td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top"><font size="12">11.</font></td>
			    <td style="vertical-align: top"><font size="12">Jenis Barang / Jasa Dagang Utama</font></td>
			    <td style="vertical-align: top">:</td>		
			    <td><?php echo $jenisbarang; ?></td>
		  	</tr>
		</table>
		<br>
		<font size="12"><b>SIUP ini diterbitkan dengan ketentuan :</b></font>
		<table>
		  	<tr>
			    <td style="vertical-align: top">PERTAMA</td>
			    <td style="vertical-align: top">:</td>		
			    <td>
			    	<table>
			    		<tr>
			    			<td style="vertical-align: top">a.</td>
			    			<td>Surat Izin Usaha Perdagangan (SIUP) ini berlaku untuk melakukan kegiatan usaha 
			    				perdagangan di seluruh Wilayah Republik Indonesia selama perusahaan masih menjalankan
			    				kegiatan Usaha Perdagangan</td>
			    		</tr>
			    		<tr>
			    			<td>b.</td>
			    			<td>Registrasi/Herregistrasi berlaku 3 (tiga) tahun</td>
			    		</tr>
			    	</table>
			    </td>
		  	</tr>
		  	<tr>
			    <td style="vertical-align: top">KEDUA</td>
			    <td style="vertical-align: top">:</td>		
			    <td>Pemilik Penanggung Jawab wajib menyampaikan laporan kegiatan 
			    	usaha perdagangannya satu kali dalam setahun, selambat-lambatnya 
			    	tanggal 31 Januari tahun berikutnya.</td>
		  	</tr>
		  	<tr>
			    <td>KETIGA</td>
			    <td>:</td>		
			    <td>Tidak berlaku untuk kegiatan Perdagangan Berjangka Komoditi.</td>
		  	</tr>
		  	<tr>
			    <td>KEEMPAT</td>
			    <td>:</td>		
			    <td>Tidak untuk melakukan kegiatan usaha selain yang tercantum dalam SIUP ini.</td>
		  	</tr>
		</table>
		<br>
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
		    			<tr>
		    				<td><font size="10pt">3.</font></td>
		    				<td><font size="10pt">Kecamatan <?php echo $kecamatan; ?></font></td>
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
		    			<font size="12">KOTA BANDUNG</font><br><br>	    			
		    			<font size="12">Kepala,</font><br><br><br>	    			
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