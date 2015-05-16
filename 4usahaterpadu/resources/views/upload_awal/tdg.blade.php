@extends('layouts.masterfront')

@section('content')
<style>
	.desc{
		font-size: 20px;
    padding: 6px 40px 30px 10px;
	}

</style>
	<p class="active" href="index.html">
		<p class="centered"><a href=""><img src="{{asset('assets/img/logo_bandung.png') }}" class="" width="120"></a></p>
		<span>
		  	<h3 class="centered"><b>Profil Badan Pelayanan Perizinan Terpadu</b></h3>
		</span>
	</p>

	<p>&nbsp;</p>
	<h4><b>Latar Belakang</b></h4>
	<p class=" text-justify">
	  	Dalam upaya meningkatkan mutu pelayanan kepada masyarakat, pada tahun 2002 Pemerintah Kota Bandung  membentuk Badan Penanaman Modal dan Pelayanan Perizinan Terpadu (BPMPPT) sesuai dengan Peraturan Daerah Kota Bandung Nomor 12 Tahun 2007 tentang Pembentukan dan Susunan Organisasi Lembaga Teknis Daerah. Namun sejalan dengan waktu dan terus mengevaluasi pelaksanaan pelayanan publik khususnya pelayanan bidang perizinan bahwa lembaga Badan Penanaman Modal dan Pelayanan Perizinan Terpadu (BPMPPT) masih dirasakan kurang maksimal sehingga dengan terbitnya Peraturan Daerah Kota Bandung Nomor 12 Tahun 2009  yang mengacu pada Peraturan Menteri Dalam Negeri Nomor 20 Tahun 2008, pada akhir Tahun 2009 lembaga Badan Penanaman Modal dan Pelayanan Perizinan Terpadu dirubah menjadi Badan Pelayanan Perizinan Terpadu (BPPT) yang memiliki struktur lebih ramping sehingga diharapkan lebih dapat memangkas tentang kendala birokrasi.
	</p>
	
	<hr>
	<h4><b>Visi</b></h4>
	<p class=" text-justify">“Badan Pelayanan Perizinan Terpadu yang Terdepan dan Terpercaya Dalam Mewujudkan Bandung Yang Unggul Nyaman dan Sejahtera"</p>

	<hr>
	<h4><b>Misi</b></h4>
	<p class=" text-justify">"Meningkatkan Kualitas Pelayanan Perizinan Terpadu Satu Pintu Secara Berkelanjutan"</p>

	<hr>
	<h4><b>Dasar Hukum</b></h4>
		<p class=" text-justify">
	  	Dalam melaksanakan tugas pokok dan fungsinya, BPPT Kota Bandung berlandaskan pada beberapa aturan sebagai berikut : 
		<ol>
		<li><span style="font-size: 12pt;"><a href="/index.php?option=com_zj_downloadslite&amp;view=document&amp;cat_id=2:regulasi&amp;id=2:perda-12-tahun-2007&amp;Itemid=109">Peraturan Daerah Kota Bandung Nomor 12 Tahun 2007 Tentang Pembentukan dan Susunan Organisasi Lembaga Teknis Daerah Kota Bandung</a>;</span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/perda_12_2009.pdf">Peraturan Daerah Kota Bandung Nomor 12 Tahun 2009 Tentang Perubahan Perda Nomor 12 Tahun 2007&nbsp;Tentang Pembentukan dan Susunan Organisasi Lembaga Teknis Daerah Kota Bandung;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/perda_22_2009.pdf">Peraturan Daerah Kota Bandung Nomor 22 Tahun 2009 Tentang Penyelenggaraan Perizinan;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="/images/files/pdf/peraturan/perda%2016%202012%20ttg%20perhubungan.pdf">Peraturan Daerah Kota Bandung Nomor 16 Tahun 2012 Tentang Penyelenggaraan Perhubungan dan Retribusi di Bidang Perhubungan;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="/images/files/pdf/peraturan/perda%2019%202012%20izin%20gangguan.pdf">Peraturan Daerah Kota Bandung Nomor 19 Tahun 2012 Tentang Izin Gangguan dan Retribusi Izin Gangguan;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/PERDA%20No.12%20Th.2011.pdf">Peraturan Daerah Kota Bandung Nomor 12 Tahun 2011 Tentang Penyelenggaraan Retribusi Izin Mendirikan Bangunan dan Retribusi Biaya Penggantian Cetak Peta;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/PERDA%20No.05%20Thn.2010.pdf">Peraturan Daerah Kota Bandung Nomor 5 Tahun 2010 Tentang Bangunan Gedung;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/12.tahun%202001.pdf">Peraturan Daerah Kota Bandung Nomor 12 Tahun 2001 tentang Tata Tertib Pengelolaan Perparkiran;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/06.Tahun%202002.pdf">Peraturan Daerah Kota Bandung Nomor 06 Tahun 2002 tentang Penyelenggaraan Pengairan di Kota Bandung;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/08.Tahun%202002.pdf">Peraturan Daerah Kota Bandung Nomor 08 Tahun 2002 tentang Pengelolaan Air Bawah Tanah;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/12.Tahun%202002.pdf">Peraturan Daerah Kota Bandung Nomor 12 Tahun 2002 tentang Ketentuan dan Tata Cara Pemberian Izin Usaha Industri, Izin Usaha Perdagangan, Wajib Daftar Perusahaan dan Tanda Daftar Gudang;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/14.Tahun%202002.pdf">Peraturan Daerah Kota Bandung Nomor 14 Tahun 2002 tentang Ijin Usaha Jasa Konstruksi;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/10.Tahun%202004.pdf">Peraturan Daerah Kota Bandung Nomor 07 Tahun 2012 tentang Penyelenggaraan Kepariwisataan;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/02.Tahun%202007.pdf">Peraturan Daerah Kota Bandung Nomor 02 Tahun 2007 tentang Penyelenggaraan Reklame;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://jdih.net/bandung/web/pdfperda/Perda_%20no.16_2012%20Perhubungan-Acc-27%20_8_%202012_22_10_2012_15_26_00_doc.pdf">Peraturan Daerah Kota Bandung Nomor 16 Tahun 2012 tentang Penyelenggaraan Perhubungan dan Retribusi di Bidang Perhubungan;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/PERWAL%20NO%20300%20THN%202013.pdf" target="_blank">Peraturan Walikota Bandung Nomor 300 Tahun 2013 Tentang Rincian Tugas Pokok, Fungsi, Uraian Tugas dan Tata Kerja BPPT Kota Bandung</a>;</span></li>
		<li><span style="font-size: 12pt;"><a href="http://www.jdih.net/bandung/web/pdfperda/PERWAL%20NO.%201171%20THN%202013%20HASIL%20KOORDINASI%20ORPAD-PROSEDUR%20PPT-1312.pdf">Peraturan Walikota Bandung Nomor 1171 Tahun 2013 Tentang Prosedur Penyelenggaraan Pelayanan Perizinan Terpadu Satu Pintu;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="/images/regulasi/kepwal_974_kep.625-bppt_2013973insentif%20bppt.pdf">Keputusan Walikota Bandung Nomor 974/Kep.625-BPPT/2013 Tentang Penetapan Penerimaan dan Besaran Insentif Pemungutan Retribusi Daerah Dilingkungan Badan Pelayanan Perizinan Terpadu Kota Bandung</a>;</span></li>
		<li><span style="font-size: 12pt;"><a href="/images/regulasi/kepwal_503_kep.1172-bag.orpad_2013_pendelegasian%20%20wewenang%20bppt.pdf">Keputusan Walikota Bandung Nomor 503/Kep.1172-Bag.ORPAD/2013 Tentang Pendelegasian Sebagian Wewenang Penandatanganan Perizinan dari Walikota Bandung kepada Kepala Badan Pelayanan Perizinan Terpadu Kota Bandung;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="/images/files/pdf/peraturan/perwal%20170%201999%20ttg%20izin%20lokasi.pdf">Keputusan Walikota Bandung Nomor 170 Tahun 1999 Tentang Tata Cara Pemberian Izin Lokasi Dalam Rangka Pelaksanaan Peraturan Menteri Negara Agraria/Kepala Badan Pertanahan Nasional Nomor 2 Tahun 1999 Tentang Izin Lokasi;</a></span></li>
		<li><span style="font-size: 12pt;"><a href="/images/files/pdf/peraturan/696.tahun%202006.pdf">Keputusan Walikota Bandung Nomor 1871 Tahun 2003 Tentang Pelaksanaan Kewenangan di Bidang Pertanahan Pada Pemerintah Kota Bandung;</a></span></li>
		</ol>
	 </p>

	<hr>
	<h4><b>Motto Layanan</b></h4>
	<p class=" text-justify">Motto layanan BPPT adalah memberikan pelayanan dengan "IKHLAS", (Inovatif, Kreatif, Handal, Layak, Amanah dan Serempak) dalam melayani masyarakat.</p>

	<hr>
	<h4><b>Maklumat Layanan</b></h4>
	<p class=" text-justify">DENGAN INI KAMI MENYATAKAN SANGGUP UNTUK MENYELENGGARAKAN PELAYANAN PERIZINAN SESUAI DENGAN STANDAR PELAYANAN YANG TELAH DITETAPKAN DAN APABILA KAMI TIDAK MENEPATI JANJI LAYANAN TEGURLAH KAMI DAN LAPORKAN KAMI KE UNIT PENGADUAN</p>

	<hr>
	<h4><b>Bagan struktur organisasi BPPT Kota Bandung sebagai berikut :</b></h4>
	<p></p>
	<p class=" text-center">
		<img src="{{asset('assets/img/bagan.png') }}" class="" width="600">
	</p>
	<hr>

@endsection
